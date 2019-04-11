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
use Tinker\Support\Aes;
use Tinker\Support\Arr;
use Tinker\Support\Openssl;

/**
 * Class Alipay
 * @package Tinker\Pay\Alipay
 */
class Alipay extends Pay
{
    /**
     * @var string
     */
    public $gateway = "https://openapi.alipay.com/gateway.do";

    /**
     * @var string
     */
    public $defaultApiVersion = '1.0';

    /**
     * @var string
     */
    public $appAuthToken = '';

    /**
     * @var string
     */
    public $authToken = '';

    /**
     * @var string
     */
    public $encryptKey= '';

    /**
     * @var string
     */
    public $encryptType = 'AES';

    /**
     *
     */
    const SDK_VERSION = 'tinker-api-sdk';

    /**
     * @param array $parameters
     * @return string
     */
    public function getSignContent(array $parameters): string
    {
        // TODO: Implement getSignContent() method.
        return Arr::sortQuery($parameters);
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
        $alg = OPENSSL_ALGO_SHA1;
        if ("RSA2" == $this->getSignType()) {
            $alg = OPENSSL_ALGO_SHA256;
        }
        return Openssl::signature($publicString, $this->rsaPrivateKey, $alg);
    }

    /**
     * @param $data
     * @param $sign
     * @return bool
     * @throws Exception
     */
    protected function verifySign($data, $sign): bool
    {
        $alg = OPENSSL_ALGO_SHA1;
        if ("RSA2" == $this->getSignType()) {
            $alg = OPENSSL_ALGO_SHA256;
        }
        return Openssl::verify($data, base64_decode($sign), $this->rsaPublicKey, $alg);
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
        return base64_encode(Aes::encrypt($content, $secret));
    }

    /**
     * @param string $encrypt
     * @return string
     */
    public function decrypt(string $encrypt)
    {
        $secret = base64_decode($this->getEncryptKey());
        $content = base64_decode($encrypt);
        return Aes::decrypt($content, $secret);
    }

    /**
     * 通知校验
     *
     * @param $arguments
     * @return array
     * @throws Exception
     */
    public function verification(array $arguments): array
    {
        // TODO: Implement verification() method.
        if (empty($arguments['sign'])) {
            throw new Exception("错误的通知参数");
        }
        $sign = $arguments['sign'];
        unset($arguments['sign_type'], $arguments['sign']);
        if (!$this->verifySign($this->getSignContent($arguments), $sign)) {
            throw new Exception("签名验证失败");
        }
        return $arguments;
    }
}
