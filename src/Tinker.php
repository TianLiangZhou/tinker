<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/14
 * Time: 09:14
 */

namespace Tinker;


use Exception;
use Tinker\Support\Xml;

abstract class Tinker implements TinkerInterface
{
    /**
     * @var string
     */
    protected $charset = 'UTF-8';

    /**
     * @var string
     */
    protected $format = 'json';

    /**
     * @var string 证书私钥|字符串或私钥绝对文件路径
     */
    protected $rsaPrivateKey = '';

    /**
     * @var string 证书公钥|字符串或公钥绝对文件路径
     */
    protected $rsaPublicKey  = '';


    /**
     * @var string 签名加密算法
     */
    protected $signType = 'RSA';

    /**
     * @var bool
     */
    protected $isCheckRequest = false;

    /**
     * @var string 网关地址
     */
    public $gateway;
    /**
     * @var array
     */
    private $contentType = [
        'text' => 'text/plain',
        'json' => 'application/json;charset=UTF-8',
        'xml'  => 'application/xml',
        'file' => 'multipart/form-data;charset=%s;boundary=%s',
        'form' => 'application/x-www-form-urlencoded;charset=%s'
    ];

    public $timeout = 5;

    /**
     * @param bool $isCheckRequest
     * @return $this;
     */
    public function setIsCheckRequest(bool $isCheckRequest): Tinker
    {
        $this->isCheckRequest = $isCheckRequest;
        return $this;
    }

    /**
     * @param string $url
     * @param array $postFields
     * @param string $contentType
     * @param array $header
     * @param array $options
     * @return mixed
     * @throws Exception
     */
    protected function curl(
        string $url,
        array $postFields = [],
        string $contentType = 'form',
        array $headers = [],
        array $options = []
    )
    {
        $ch = curl_init();
        $curlOptions = [
            CURLOPT_URL => $url,
            CURLOPT_FAILONERROR => false,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POST => count($postFields) ? true : false
        ];
        if (isset($options['isCert']) && $options['isCert'] && $this->rsaPublicKey && $this->rsaPrivateKey) {
            $curlOptions[CURLOPT_SSLCERTTYPE] = 'PEM';
            $curlOptions[CURLOPT_SSLCERT] = $this->rsaPrivateKey;
            $curlOptions[CURLOPT_SSLKEYTYPE] = 'PEM';
            $curlOptions[CURLOPT_SSLKEY] = $this->rsaPublicKey;
        }
        if (count($postFields) > 0) {
            $rootName = isset($options['rootName']) ? $options['rootName'] : 'xml';
            $isCdata  = isset($options['isCdata']) ? $options['isCdata'] : false;
            $curlOptions[CURLOPT_POSTFIELDS] = $this->getFormatPostData(
                $postFields, $contentType, $rootName, $isCdata
            );
        }
        array_push($headers, $this->getContentType($contentType));
        $curlOptions[CURLOPT_HTTPHEADER] = $headers;
        curl_setopt_array($ch, $curlOptions);
        $response = curl_exec($ch);
        if (curl_errno($ch)) {
            throw new Exception(curl_error($ch), 0);
        } else {
            $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if (200 !== $httpStatusCode) {
                throw new Exception($response, $httpStatusCode);
            }
        }
        curl_close($ch);
        return $response;
    }

    /**
     * 根据类型返回对应的数据和头标识
     *
     * @param array $raw
     * @param string $contentType
     * @param string $rootName
     * @param bool $isCdata
     * @return array
     */
    protected function getFormatPostData(
        array $raw,
        string $contentType = 'form',
        string $rootName = 'root',
        bool $isCdata = false
    )
    {
        switch ($contentType) {
            case 'text':
                $formatData = implode("\n", $raw);
                break;
            case 'json':
                $formatData = json_encode($raw);
                break;
            case 'xml':
                $formatData = Xml::import($raw, $rootName, $isCdata);
                break;
            default:
                $formatData = http_build_query($raw);
        }
        return $formatData;
    }

    /**
     * @param string $responseString
     * @return mixed
     */
    protected function formatResponse(string $responseString)
    {
        switch ($this->getResponseFormat()) {
            case 'xml':
                $response = Xml::simple($responseString);
                break;
            default:
                $response = json_decode($responseString);
        }
        return $response;
    }

    /**
     * @param string $contentType
     * @return string
     */
    protected function getContentType(string $contentType)
    {
        $content = sprintf(
            $this->contentType[$contentType] ?? $this->contentType['form'],
            $this->getCharset(),
            $this->getMillisecond()
        );
        return 'Content-Type: ' . $content;
    }

    /**
     * @return float
     */
    public function getMillisecond()
    {
        list($s1, $s2) = explode(' ', microtime());
        return (float) sprintf('%.0f', (floatval($s1) + floatval($s2)) * 1000);
    }

    /**
     * @return string
     */
    public function getCharset(): string
    {
        // TODO: Implement getCharset() method.
        return $this->charset;
    }

    /**
     * @param string $charset
     * @return TinkerInterface
     */
    public function setCharset(string $charset): TinkerInterface
    {
        // TODO: Implement setCharset() method.
        $this->charset = strtoupper($charset);
        return $this;
    }

    /**
     * @param string $format
     * @return TinkerInterface
     */
    public function setResponseFormat(string $format): TinkerInterface
    {
        // TODO: Implement setResponseFormat() method.
        $this->format = strtolower($format);
        return $this;
    }

    /**
     * @return string
     */
    public function getResponseFormat(): string
    {
        // TODO: Implement getResponseFormat() method.
        return $this->format;
    }
    
    /**
     * @param string $privateKey
     * @return $this
     */
    public function setRsaPrivateKey(string $privateKey): Tinker
    {
        $this->rsaPrivateKey = $privateKey;
        return $this;
    }

    /**
     * @param string $rsaPublicKey
     * @return $this
     */
    public function setRsaPublicKey(string $rsaPublicKey): Tinker
    {
        $this->rsaPublicKey = $rsaPublicKey;
        return $this;
    }

    /**
     * @param string $signType
     * @return TinkerInterface
     */
    public function setSignType(string $signType): TinkerInterface
    {
        // TODO: Implement setSignType() method.
        $this->signType = strtoupper($signType);

        return $this;
    }

    /**
     * @return string
     */
    public function getSignType(): string
    {
        // TODO: Implement getSignType() method.
        return $this->signType;
    }

    /**
     * 实现签名
     *
     * @param string $publicString
     * @return string
     */
    abstract public function sign(string $publicString): string;

    /**
     * 需要签名的数据
     *
     * @param array $parameters
     * @return string
     */
    abstract public function getSignContent(array $parameters): string;

    /**
     * 是否检测request参数
     *
     * @return bool
     */
    public function isCheck(): bool
    {
        return $this->isCheckRequest;
    }
}
