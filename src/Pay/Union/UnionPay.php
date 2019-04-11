<?php

/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2019-03-08
 * Time: 17:46
 */
namespace Tinker\Pay\Union;

use DateTime;
use Exception;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Tinker\Pay\Pay;
use Tinker\RequestInterface;
use Tinker\ResponseInterface;
use Tinker\Support\Arr;

/**
 * Class UnionPay
 * @package Tinker\Pay\Union
 */
class UnionPay extends Pay
{

    /**
     * @var string
     */
    public $gateway = "https://gateway.95516.com";

    /**
     * 版本号
     *
     * @var string
     */
    public $version = '5.1.0';

    /**
     * 渠道类型 默认手机, 07PC
     *
     * @var string
     */
    public $channel = '08';

    /**
     * 接入类型
     *
     * @var string
     */
    public $access = '0';

    /**
     * @var string
     */
    public $privateCertPath = ''; // 从cfca获取到的私钥证书

    /**
     * @var string
     */
    public $privateCertPwd  = '123456';

    /**
     * @var string
     */
    public $rootCertPath = ''; //验签根证书

    /**
     * @var string
     */
    public $middleCertPath = ''; //验签中级证书

    /**
     * @var string
     */
    public $certPath = '';  // 证书目录

    /**
     * UnionPay constructor.
     * @param string $appId
     * @param string|null $appKey
     */
    public function __construct(string $appId, ?string $appKey = '')
    {
        parent::__construct($appId, $appKey);

        $this->setSignType('01');
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
        $signature = $arguments['signature'];
        unset($arguments['signature']);
        $queryString = Arr::sortQuery($arguments);
        $verify = false;
        if ($arguments['signMethod'] == $this->getSignType()) {
            switch ($arguments['version']) {
                case '5.1.0':
                    $certString = $this->verifyCert($arguments['signPubKeyCert']);
                    $verify = (bool) openssl_verify(
                        hash('sha256', $queryString), base64_decode($signature), $certString, 'sha256'
                    );
                    break;
                case '5.0.0':
                    $certString = $this->getPublicKeyByCertId($arguments['certId']);
                    $verify = (bool) openssl_verify(
                        sha1($queryString, false), base64_decode($signature), $certString, OPENSSL_ALGO_SHA1
                    );
                    break;
            }
        } else {
            $selfSign = hash('sha256', $queryString . '&' . hash('sha256', $this->encryptKey));
            $verify = $selfSign == $signature;
        }
        if ($verify) {
            return $arguments;
        }
        throw new Exception("验证失败");
    }

    /**
     * 实现签名
     *
     * @param string $publicString
     * @return string
     * @throws Exception
     */
    public function sign(string $publicString): string
    {
        // TODO: Implement sign() method.
        switch ($this->getSignType()) {
            case '01':
                $signature = null;
                $cert = $this->readCert($this->privateCertPath, $this->privateCertPwd);
                $result = false;
                switch ($this->version) {
                    case '5.0.0':
                        $paramsSha1x16 = sha1($publicString, false);
                        // 签名
                        $result = openssl_sign($paramsSha1x16, $signature, $cert['key'], OPENSSL_ALGO_SHA1);
                        break;
                    case '5.1.0':
                        //a256签名摘要
                        $paramsSha256x16 = hash( 'sha256', $publicString);
                        // 签名
                        $result = openssl_sign($paramsSha256x16, $signature, $cert['key'], 'sha256');
                        break;
                }
                if (empty($signature) || $result == false) {
                    throw new Exception("签名失败");
                }
                return base64_encode($signature);
            case '11':
                $paramsBeforeSha256 = hash('sha256', $this->encryptKey);
                $paramsBeforeSha256 = $publicString. '&' . $paramsBeforeSha256;
                return hash('sha256', $paramsBeforeSha256);
        }
        throw new Exception("签名方法不支持");

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
        return Arr::sortQuery($parameters);
    }

    /**
     * @param string $certPath
     * @param string $certPassword
     * @return array
     * @throws Exception
     */
    protected function readCert(string $certPath, string $certPassword)
    {
        static $read = [];
        if (isset($read[$certPath])) {
            return $read[$certPath];
        }
        $content = file_get_contents($certPath);
        if (empty($content)) {
            throw new Exception("证书读取失败，或者证不存在");
        }
        $cert = [];
        if (openssl_pkcs12_read($content, $cert, $certPassword) == false) {
            throw new Exception("openssl证书读取失败");
        }
        if (($x509 = openssl_x509_read($cert['cert'])) == false) {
            throw new Exception("openssl证书x509读取失败");
        }
        $x509Array = openssl_x509_parse($cert['cert']);

        $certInfo = ['key' => $cert['pkey'], 'cert' => $cert['cert'], 'certId' => $x509Array['serialNumber']];
        $read[$certPath] = $certInfo;
        return $certInfo;
    }

    /**
     * @param string $base64PublicKey
     * @return string
     * @throws Exception
     */
    public function verifyCert(string $base64PublicKey)
    {
        openssl_x509_read($base64PublicKey);
        $certInfo = openssl_x509_parse($base64PublicKey);
        $cn = $certInfo['subject']['CN'];
        $company = explode('@', $cn);
        if (count($company) < 3) {
            throw new Exception("证书验证失败");
        }
        $fromTime = new DateTime("@" . $certInfo['validFrom_time_t']);
        $toTime = new DateTime("@" . $certInfo['validTo_time_t']);
        $now = new DateTime(date('Ymd'));
        if ($fromTime->diff($now)->invert || $now->diff($toTime)->invert) {
            throw new Exception("证书已过期");
        }
        $result = openssl_x509_checkpurpose(
            $base64PublicKey, X509_PURPOSE_ANY, [$this->rootCertPath, $this->middleCertPath]
        );
        if (!$result) {
            throw new Exception("数据验证失败");
        }
        return $base64PublicKey;
    }

    /**
     * @param string $certId
     * @return string
     * @throws Exception
     */
    public function getPublicKeyByCertId(string $certId)
    {
        $objects = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($this->certPath),
            RecursiveIteratorIterator::SELF_FIRST
        );
        foreach ($objects as $object) {
            /**
             * @var $object \SplFileInfo
             */
            if ($object->isFile() && $object->getExtension() == 'cer') {
                $file = $object->getPath() . DIRECTORY_SEPARATOR . $object->getFilename();
                $certContent = file_get_contents($file);
                if (empty($certContent)) {
                    continue;
                }
                if (!openssl_x509_read($certContent)) {
                    continue;
                }
                $certInfo = openssl_x509_parse($certContent);
                if ($certId == $certInfo['serialNumber']) {
                    return $certContent;
                }
            }
        }
        throw new Exception("证书不存在");
    }

    /**
     * @param RequestInterface $method
     * @param string $mode
     * @return ResponseInterface
     * @throws \Exception
     */
    public function execute(RequestInterface $method, string $mode = "default"): ResponseInterface
    {
        // TODO: Implement execute() method.

        $systemParameters = [
            'version' => $this->version,                 //版本号
            'encoding' => $this->getCharset(),				  //编码方式
            'signMethod' => $this->getSignType(),	     //签名方法
            'channelType' => $this->channel,	              //渠道类型，07-PC，08-手机
            'accessType' => $this->access,		          //接入类型
            'merId' => $this->appId,	      //商户代码，
            'txnTime' => date("YmdHis"),	//订单发送时间，格式为YYYYMMDDhhmmss
        ];
        $requestParameters = $method->getApiParameters();
        $requestUrl = $this->gateway . $method->getApiMethodName();
        $parameters = array_merge($systemParameters, $requestParameters);
        if ($this->getSignType() == '01') {
            $cert = $this->readCert($this->privateCertPath, $this->privateCertPwd);
            $parameters['certId'] = $cert['certId'];
        }
        $signature = $this->sign($this->getSignContent($parameters));
        $parameters['signature'] = $signature;
        $responseString = $this->curl($requestUrl, $parameters);
        parse_str($responseString, $response);
        return new UnionResponse($response, $method->getApiMethodName());
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
     * @param string $channel
     */
    public function setChannel(string $channel): void
    {
        $this->channel = $channel;
    }

    /**
     * @param string $access
     */
    public function setAccess(string $access): void
    {
        $this->access = $access;
    }
}
