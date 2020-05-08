<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2019-03-08
 * Time: 17:49
 */
namespace Tinker\Pay\Yee;

use Exception;
use Tinker\Pay\Pay;
use Tinker\RequestInterface;
use Tinker\ResponseInterface;
use Tinker\Support\Aes;
use Tinker\Support\Arr;
use Tinker\Support\Openssl;
use Tinker\Support\Str;

class YeePay extends Pay
{
    /**
     * @var string
     */
    public $gateway = 'https://open.yeepay.com/yop-center';
    /**
     * @var string
     */
    public $version = '1.0';

    /**
     * @var string
     */
    public $locale = 'zh_CN';

    /**
     * YeePay constructor.
     * @param string $appMerchantNo
     * @param string $appKey
     * @param array $options
     */
    public function __construct(string $appMerchantNo, string $appKey, array $options = [])
    {
        parent::__construct($appMerchantNo, $appKey, $options);
    }

    /**
     * 通知校验
     *
     * @param $arguments
     * @return mixed
     * @throws Exception
     */
    public function verification(array $arguments): array
    {
        // TODO: Implement verification() method.
        $encryptData = current($arguments);
        if (empty($encryptData)) {
            throw new Exception("验证数据为空");
        }
        $decrypt = $this->notifyDecrypt($encryptData);
        if (empty($decrypt)) {
            throw new Exception("验证失败");
        }
        $response = json_decode($decrypt, true);
        if (isset($response['status']) && $response['status'] != 'SUCCESS') {
            return $response;
        }
        throw new Exception("验证失败");
    }

    /**
     * @param string $content
     * @return bool|null|string
     * @throws Exception
     */
    private function notifyDecrypt(string $content)
    {
        $splitContent = explode('$', $content);
        if (count($splitContent) != 4) {
            throw new Exception("无效的内容");
        }
        $randomKey = $splitContent[0];
        $data = $splitContent[1];
        $digestAlg = strtoupper($splitContent[3]);
        $decryptRandomKey = Openssl::privateDecrypt(Str::urlSafeDecode($randomKey), $this->rsaPrivateKey);
        $decryptData = Aes::decrypt(Str::urlSafeDecode($data), $decryptRandomKey, '', OPENSSL_RAW_DATA, 'AES-128-ECB');
        $sign = substr(strrchr($decryptData, '$'), 1);
        $sourceData = substr($decryptData, 0, strlen($decryptData) - strlen($sign) - 1);
        $alg = OPENSSL_ALGO_SHA1;
        if ($digestAlg == 'SHA256') {
            $alg = OPENSSL_ALGO_SHA256;
        }
        $res = Openssl::verify($sourceData, Str::urlSafeDecode($sign), $this->rsaPublicKey, $alg);
        if ($res) {
            return $sourceData;
        }
        return null;
    }

    /**
     * 实现签名
     *
     * @param string $publicString
     * @return string
     */
    public function sign(string $publicString): string
    {
        // TODO: Implement sign() method.
    }

    /**
     * 需要签名的数据
     *
     * @param array $parameters
     * @return string
     * @throws Exception
     */
    public function getSignContent(array $parameters): string
    {
        // TODO: Implement getSignContent() method.
        $path = $parameters['method'];
        unset($parameters['method']);
        $timestamp = date('Y-m-d\TH:i:sO');
        $requestId = Str::uuid();
        $headers = [
            'x-yop-appkey' => $this->appSecret,
            'x-yop-date' => $timestamp,
            'x-yop-request-id' => $requestId,
        ];
        $protocolVersion = 'yop-auth-v2';
        $expiredSeconds = '1800';
        $queryString = Arr::sortQuery($parameters, 'rawurlencode');
        $authString = $protocolVersion . '/' . $this->appSecret . '/' . $timestamp . '/' . $expiredSeconds;
        $queryHeaderString = implode("\n", Arr::header($headers, 'rawurlencode'));
        $headerSignString = implode(';', array_keys($headers));
        $canonicalRequest = $authString . "\nPOST\n" . $path . "\n" . $queryString . "\n" . $queryHeaderString;
        $signature = Openssl::signature(
            $canonicalRequest,
            $this->rsaPrivateKey,
            OPENSSL_ALGO_SHA256,
            true
        );
        $headers['Authorization'] = "YOP-RSA2048-SHA256 " . $protocolVersion . "/" . $this->appSecret. "/" .
            $timestamp . "/" . $expiredSeconds. "/" . $headerSignString. "/" . $signature . '$SHA256';
        return json_encode(Arr::header($headers));
    }

    /**
     * @param RequestInterface $method
     * @param string $mode
     * @return ResponseInterface
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function execute(RequestInterface $method, string $mode = "default"): ResponseInterface
    {
        // TODO: Implement execute() method.
        $systemParameters = [
            'appKey' => $this->appSecret,
            'v' => $this->version,
            'locale' => $this->locale,
            'ts' => time(),
            'parentMerchantNo' => $this->appId,
            'merchantNo' => $this->appId,
        ];
        $requestParameters = $method->getApiParameters();
        $allParameters = array_merge($systemParameters, $requestParameters);
        $url = $this->getGatewayUrl() . $method->getApiMethodName();
        $allParameters['method'] = $method->getApiMethodName();
        $headers = $this->getSignContent($allParameters);
        unset($allParameters['method']);
        $response = $this->getResponse(
            $url,
            [
                'form_params' => $allParameters,
                'headers' => json_decode($headers, true),
            ]
        );
        return new YeePayResponse(
            $response,
            $method->getApiMethodName(),
            $this->getResponseFormat()
        );
    }

    /**
     * @return string
     */
    public function getGatewayUrl(): string
    {
        // TODO: Implement getGatewayUrl() method.
        return $this->gateway;
    }
}
