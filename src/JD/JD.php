<?php


namespace Tinker\JD;

use Tinker\RequestInterface;
use Tinker\ResponseInterface;
use Tinker\Tinker;

class JD extends Tinker
{
    public $gateway = "https://router.jd.com/api";

    /**
     * @var string
     */
    private $apiVersion = "1.0";


    /**
     * Taobao constructor.
     * @param string $appId
     * @param string $appSecret
     * @param array $options
     */
    public function __construct(string $appId, string $appSecret, array $options = [])
    {
        parent::__construct(array_merge(['appId' => $appId, 'appSecret' => $appSecret,], $options));
        $this->setSignType('md5');
        $this->setResponseFormat('json');
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
        return strtoupper(md5($this->appSecret . $publicString . $this->appSecret));
    }

    /**
     * 需要签名的数据
     *
     * @param array $parameters
     * @return string
     */
    public function getSignContent(array $parameters): string
    {
        // TODO: Implement getSignContent() method.
        ksort($parameters);
        $string = '';
        foreach ($parameters as $name => $value) {
            if ($value) {
                $string .= $name . $value;
            }
        }
        return $string;
    }

    /**
     * @param RequestInterface $request
     * @param string $session
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function execute(RequestInterface $request, string $session = ""): ResponseInterface
    {
        // TODO: Implement execute() method.

        $systemParameters = [
            //组装系统参数
            "v" => $this->apiVersion,
            "format" => $this->getResponseFormat(),
            "app_key" => $this->appId,
            "method" => $request->getApiMethodName(),
            "timestamp" => date("Y-m-d H:i:s"),
            'sign_method' => $this->getSignType(),
            'access_token'=> $session,
        ];
        $apiParameters = $request->getApiParameters();
        $systemParameters['sign'] = $this->sign($this->getSignContent(array_merge($systemParameters, $apiParameters)));

        $requestUrl = $this->getGatewayUrl()  . '?' . http_build_query($systemParameters + $apiParameters);
        return new JDResponse(
            $this->getResponse($requestUrl),
            $request->getApiMethodName(),
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
