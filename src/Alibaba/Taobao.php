<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/24
 * Time: 14:50
 */

namespace Tinker\Alibaba;

use Exception;
use Tinker\RequestInterface;
use Tinker\ResponseInterface;
use Tinker\Tinker;

class Taobao extends Tinker
{
    public $gateway = "http://gw.api.taobao.com/router/rest";

    /**
     * @var string
     */
    private $apiVersion = "2.0";

    private $sdkVersion = "tinker-api-sdk";

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
        $this->setCheckRequest(true);
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
        if ($this->getSignType() == 'MD5') {
            return strtoupper(md5($publicString));
        }
        throw new Exception("不支持的加密算法");
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

        $stringToBeSigned = $this->appSecret;
        foreach ($parameters as $k => $v) {
            if (!is_array($v) && "@" != substr($v, 0, 1)) {
                $stringToBeSigned .= "$k$v";
            }
        }
        $stringToBeSigned .= $this->appSecret;
        return $stringToBeSigned;
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
        if ($this->isCheck()) {
            $request->check();
        }
        $systemParameters = [
            //组装系统参数
            "app_key" => $this->appId,
            "v" => $this->apiVersion,
            "format" => $this->getResponseFormat(),
            "sign_method" => strtolower($this->getSignType()),
            "method" => $request->getApiMethodName(),
            "timestamp" => date("Y-m-d H:i:s"),
            "partner_id" => $this->sdkVersion,
        ];
        if ($session) {
            $systemParameters['session'] = $session;
        }
        $apiParameters = $request->getApiParameters();
        $systemParameters['sign'] = $this->sign($this->getSignContent(array_merge($systemParameters, $apiParameters)));
        $requestUrl = $this->getGatewayUrl()  . '?' . http_build_query($systemParameters);
        return new TaobaoResponse(
            $this->getResponse($requestUrl, ['form_params' => $apiParameters]),
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
