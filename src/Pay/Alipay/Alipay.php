<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/10
 * Time: 16:22
 */

namespace Tinker\Pay\Alipay;


use Tinker\RequestInterface;
use Tinker\Pay\Pay;
use Exception;
use SimpleXMLElement;
use Tinker\ResponseInterface;

/**
 * Class Alipay
 * @package Tinker\Pay\Alipay
 */
class Alipay extends Pay
{
    public $gateway = "https://openapi.alipay.com/gateway.do";

    public $defaultApiVersion = '1.0';

    public $appAuthToken = '';

    public $authToken = '';

    public $encryptKey= '';

    public $encryptType = 'AES';

    const SDK_VERSION = 'tinker-api-sdk';

    /**
     * @param array $parameters
     * @return string
     */
    public function getSignContent(array $parameters): string
    {
        // TODO: Implement getSignContent() method.
        ksort($parameters);
        $stringToBeSigned = [];
        foreach ($parameters as $k => $v) {
            if (empty($v) || is_array($v) || "@" == substr($v, 0, 1)) {
                continue;
            }
            $stringToBeSigned[] = "$k=$v";
        }
        return implode('&', $stringToBeSigned);
    }

    /**
     * @param string $publicString
     * @return string
     * @throws \Exception
     */
    public function sign(string $publicString): string
    {
        // TODO: Implement sign() method.

        if (empty($this->rsaPrivateKey)) {
            throw new Exception("您使用的私钥格式错误，请检查RSA私钥配置");
        }
        $isFile = false;
        if (!is_file($this->rsaPrivateKey)) {
            $resource = "-----BEGIN RSA PRIVATE KEY-----\n" .
                wordwrap($this->rsaPrivateKey, 64, "\n", true) .
                "\n-----END RSA PRIVATE KEY-----";
        } else {
            $resource = openssl_get_privatekey(file_get_contents($this->rsaPrivateKey));
            $isFile = true;
        }
        if ("RSA2" == $this->getSignType()) {
            openssl_sign($publicString, $sign, $resource, OPENSSL_ALGO_SHA256);
        } else {
            openssl_sign($publicString, $sign, $resource);
        }
        $isFile && openssl_free_key($resource);
        return base64_encode($sign);
    }

    /**
     * @param $data
     * @param $sign
     * @return bool
     * @throws Exception
     */
    protected function verifySign($data, $sign): bool
    {
        $isFile = false;
        if (is_file($this->rsaPublicKey)) {
            $res = openssl_get_publickey(file_get_contents($this->rsaPublicKey));
        } else {
            $res = "-----BEGIN PUBLIC KEY-----\n" .
                    wordwrap($this->rsaPublicKey, 64, "\n", true) .
                    "\n-----END PUBLIC KEY-----";
        }
        if (empty($res)) {
            throw new Exception("支付宝RSA公钥错误。请检查公钥文件格式是否正确");
        }
        if ("RSA2" == $this->getSignType()) {
            $result = (openssl_verify($data, base64_decode($sign), $res, OPENSSL_ALGO_SHA256) === 1);
        } else {
            $result = (openssl_verify($data, base64_decode($sign), $res) === 1);
        }
        $isFile && openssl_free_key($res);
        return $result;
    }

    /**
     * @param AlipayRequest $request
     * @param string $mode
     * @return string
     * @throws \Exception
     */
    public function execute(RequestInterface $request, string $mode = "default"): ResponseInterface
    {
        // TODO: Implement execute() method.
        $systemParameters = [
            'app_id' => $this->appId,
            'method' => $request->getApiMethodName(),
            'format' => $this->getResponseFormat(),
            'sign_type' => $this->getSignType(),
            'timestamp' => date("Y-m-d H:i:s"),
            'alipay_sdk'=> self::SDK_VERSION,
            'charset'   => $this->getCharset(),
            'version'   => $request->getApiVersion() ?? $this->defaultApiVersion,
            'notify_url'=> empty(($notifyUrl = $request->getNotifyUrl())) ? $this->getNotifyUrl() : $notifyUrl,
            'terminal_type' => $request->getTerminalType(),
            'terminal_info' => $request->getTerminalInfo(),
            'prod_code' => $request->getProductCode(),
            'app_auth_token' => $this->appAuthToken,
            'auth_token' => $this->authToken,
        ];
        if (($returnUrl = $this->getReturnUrl()) || ($returnUrl = $request->getReturnUrl())) {
            $systemParameters["return_url"] = $returnUrl;
        }
        $apiParameters = $request->getApiParameters();
        if ($request->isEncrypt()) {
            if (empty($this->getEncryptKey())) {
                throw new Exception("AES加密密钥不能为空");
            }
            $apiParameters['biz_content'] = $this->encrypt($apiParameters['biz_content']);
            $systemParameters['encrypt_type'] = $this->encryptType;
        }
        if (strcasecmp($this->systemCharset, $this->getCharset()) != 0) {
            foreach ($apiParameters as &$value) {
                $value = $this->convertCharset($value);
            }
            unset($value);
        }
        $allParameters = array_merge($systemParameters, $apiParameters);
        foreach ($allParameters as $key => $v) {
            if (empty($v)) {
                unset($allParameters[$key]);
            }
        }
        $allParameters['sign'] = $systemParameters['sign'] = $this->sign($this->getSignContent($allParameters));
        if ($mode == 'sdk' || $mode == 'url') {
            $query = http_build_query($allParameters);
            if ($mode == 'sdk') {
                return new AlipayResponse($query, $request->getApiMethodName());
            }
            return new AlipayResponse($this->getGatewayUrl() . '?' . $query, $request->getApiMethodName());
        }
        if ($mode == 'page') {
            return new AlipayResponse($this->buildRequestForm($allParameters), $request->getApiMethodName());
        }
        $requestUrl = $this->getGatewayUrl() . '?' . http_build_query($systemParameters);
        try {
            $responseString = $this->curl($requestUrl, $apiParameters);
        } catch (Exception $e) {
            throw $e;
        }
        if ($this->getCharset() != $this->systemCharset) {
            $responseString = mb_convert_encoding($responseString, $this->systemCharset, $this->getCharset());
        }
        $response = $this->formatResponse($responseString);
        $this->checkResponseSign($response, $request->getApiMethodName());
        if ($request->isEncrypt()) {
            $response = $this->formatResponse($this->decryptResponse($response, $request->getApiMethodName()));
        }
        return new AlipayResponse($response, $request->getApiMethodName(), $this->getResponseFormat());
    }

    /**
     * @param $response
     * @param string $method
     * @return bool
     * @throws Exception
     */
    protected function checkResponseSign($response, string $method)
    {
        if (empty($response->sign) || empty($this->rsaPublicKey)) {
            return true;
        }
        $sign = $response->sign;
        if ($response instanceof SimpleXMLElement) {
            $data = '';
            foreach ($response as $name => $value) {
                if ($name == 'sign') {
                    continue;
                }
                $data .= "<$name>$value</$name>";
            }
        } else {
            $api = str_replace('.', '_', $method) . '_' . 'response';
            $data = json_encode($response->$api);
        }
        if (!$this->verifySign($data, $sign)) {
            throw new Exception("check sign Fail! [sign=" . $sign . ", signSourceData=" . $data . "]");
        }
        return true;
    }

    /**
     * @param $response
     * @param $method
     * @return string
     */
    protected function decryptResponse($response, $method): string
    {
        $content = null;

        $api = str_replace('.', '_', $method) . '_' . 'response';
        if ($response instanceof SimpleXMLElement) {
            $content = $response->response_encrypted;
        } else {
            $content = $response->$api;
        }
        $decryptContent = $this->decrypt($content);
        if ($this->getResponseFormat() == 'xml') {
            $restoreResponse = <<<EOF
<?xml version="1.0" encoding="UTF-8" ?>
<$api>
$decryptContent
<sign>{$response->sign}</sign>
</$api>
EOF;
        } else {
            $restoreResponse = <<<EOF
{"$method":"$decryptContent","sign":"{$response->sign}"}
EOF;
        }
        return $restoreResponse;
    }

    /**
     * 建立请求，以表单HTML形式构造（默认）
     *
     * @param array $para_temp 请求参数数组
     * @return string
     */
    protected function buildRequestForm(array $postData)
    {
        $postUrl = $this->getGatewayUrl() . '?charset=' . $this->getCharset();
        $hidden = [];
        foreach ($postData as $name => $value) {
            if (!empty($value) && ($val = str_replace("'","&apos;", $value))) {
                $hidden[] = <<<EOF
<input type="hidden" name="$name" value='$val'/>
EOF;
            }
        }
        $hiddenString = implode("\n", $hidden);
        $formHtml = <<<EOF
<form id="alipaysubmit" name="alipaysubmit" action="$postUrl" method="POST">
$hiddenString
<input type="submit" value="ok" style="display:none;">
</form>
<script>document.forms['alipaysubmit'].submit();</script>
EOF;
        return $formHtml;
    }

    /**
     * @return string
     */
    public function getGatewayUrl(): string
    {
        // TODO: Implement getGatewayUrl() method.
        return $this->gateway;
    }

    /**
     * @param string $content
     * @return string
     */
    public function encrypt(string $content)
    {
        $secret = base64_decode($this->getEncryptKey());
        $method = $this->getEncryptMethod($secret);
        $encrypt = @openssl_encrypt($content, $method, $secret, OPENSSL_RAW_DATA);
        return base64_encode($encrypt);
    }

    /**
     * @param string $encrypt
     * @return string
     */
    public function decrypt(string $encrypt)
    {
        $secret = base64_decode($this->getEncryptKey());
        $method = $this->getEncryptMethod($secret);
        $content = base64_decode($encrypt);
        return openssl_decrypt($content, $method, $secret, 1);
    }

    /**
     * @param string $secret
     * @return string
     */
    public function getEncryptMethod(string $secret)
    {
        $len = strlen($secret);
        if ($len <= 16) {
            $method = 'AES-128-CBC';
        } elseif ($len > 16 && $len <= 24) {
            $method = 'AES-192-CBC';
        } else {
            $method = 'AES-256-CBC';
        }
        return $method;
    }

    /**
     * 通知校验
     *
     * @param $result
     * @return array
     * @throws Exception
     */
    public function verification(array $result): array
    {
        // TODO: Implement verification() method.
        if (empty($result['sign'])) {
            throw new Exception("错误的通知参数");
        }
        $sign = $result['sign'];
        unset($result['sign_type'], $result['sign']);
        if (!$this->verifySign($this->getSignContent($result), $sign)) {
            throw new Exception("签名验证失败");
        }
        return $result;
    }
}
