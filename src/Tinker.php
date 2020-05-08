<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/14
 * Time: 09:14
 */

namespace Tinker;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface as HttpClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Tinker\Support\Xml;

abstract class Tinker implements TinkerInterface
{

    /**
     *
     */
    const METHOD_POST = "POST";

    /**
     *
     */
    const METHOD_GET = "GET";

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
    protected $checkRequest = false;

    /**
     * @var string 网关地址
     */
    public $gateway;

    /**
     * @var string
     */
    protected $appId;

    /**
     * @var string
     */
    protected $appSecret;


    protected $timeout = 5;

    /**
     * @var HttpClientInterface
     */
    protected $httpClient;

    /**
     * @var array
     */
    private $options;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * Tinker constructor.
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->fillProperties($options);
        if (empty($options['timeout'])) {
            $options['timeout'] = $this->timeout;
        }
        $this->options = $options;
        if (empty($options['httpClient'])) {
            $options['httpClient'] = function () use ($options) {
                return new HttpClient($options);
            };
        }
        $this->setHttpClient($options['httpClient']);
    }

    /**
     * @return HttpClientInterface
     */
    public function getHttpClient(): HttpClientInterface
    {
        if (is_callable($this->httpClient)) {
            $this->httpClient = call_user_func($this->httpClient, $this->options);
        }
        return $this->httpClient;
    }

    /**
     * @param HttpClientInterface | callable $httpClient
     */
    public function setHttpClient($httpClient): void
    {
        $this->httpClient = $httpClient;
    }


    /**
     * @param string $uri
     * @param array $options
     * @return \SimpleXMLElement|\stdClass
     * @throws GuzzleException
     */
    protected function getResponse(string $uri, array $options = [])
    {
        $method = self::METHOD_GET;
        if (!empty($options['body']) ||
            !empty($options['form_params']) ||
            !empty($options['multipart']) ||
            !empty($options['json'])
        ) {
            $method = self::METHOD_POST;
        }
        $request = $this->createRequest($method, $uri, $options);
        $response = $this->getHttpClient()->send($request, $options);
        if ($response->getStatusCode() !== 200) {
            throw new RequestException("请求异常", $request, $response);
        }
        return $this->formatResponse($response->getBody()->getContents());
    }


    /**
     * @param string $method
     * @param string $uri
     * @param array $options
     * @return \GuzzleHttp\Psr7\Request
     */
    private function createRequest(string $method, string $uri, array $options = [])
    {
        $defaults = [
            'headers' => [],
            'body'    => null,
            'version' => '1.1',
        ];

        $options = array_merge($defaults, $options);

        return new \GuzzleHttp\Psr7\Request(
            $method,
            $uri,
            $options['headers'],
            $options['body'],
            $options['version']
        );
    }

    /**
     * @param string $responseString
     * @return mixed
     */
    protected function formatResponse(string $responseString)
    {
        switch ($this->getResponseFormat()) {
            case 'xml':
                return Xml::simple($responseString);
                break;
            case 'json':
                return json_decode($responseString);
                break;
            case 'parse':
                parse_str($responseString, $response);
                return $response;
            default:
                return $responseString;
        }
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
     *
     * @param array $options
     */
    protected function fillProperties(array $options = [])
    {
        foreach ($options as $option => $value) {
            if (property_exists($this, $option) && !$this->isGuarded($option)) {
                $this->{$option} = $value;
            }
        }
    }

    /**
     * 是否检测request参数
     *
     * @return bool
     */
    public function isCheck(): bool
    {
        return $this->checkRequest;
    }

    /**
     * @param bool $checkRequest
     * @return $this;
     */
    public function setCheckRequest(bool $checkRequest): Tinker
    {
        $this->checkRequest = $checkRequest;
        return $this;
    }

    /**
     * @param string $option
     * @return bool
     */
    private function isGuarded(string $option)
    {
        return $this->guarded && in_array($option, $this->guarded);
    }
}
