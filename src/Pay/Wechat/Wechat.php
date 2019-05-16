<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/10
 * Time: 16:22
 */

namespace Tinker\Pay\Wechat;


use Exception;
use Tinker\Pay\Wechat\Request\WechatUnifiedOrderRequest;
use Tinker\RequestInterface;
use Tinker\Pay\Pay;
use Tinker\ResponseInterface;
use Tinker\Support\Arr;
use Tinker\Support\Xml;

class Wechat extends Pay
{
    /**
     * @var string
     */
    public $gateway = 'https://api.mch.weixin.qq.com';

    /**
     * @var int 商户号
     */
    private $merchantId = 0;

    /**
     * Wechat constructor.
     * @param string $appId
     * @param string $appKey
     * @param int $appMerchantId
     */
    public function __construct(string $appId, string $appKey, int $appMerchantId)
    {
        parent::__construct($appId, $appKey);
        $this->merchantId = $appMerchantId;
        $this->setSignType('MD5');
        $this->setResponseFormat('json');
    }

    /**
     * @param string $publicString
     * @return string
     */
    public function sign(string $publicString): string
    {
        // TODO: Implement sign() method.
        switch ($this->getSignType()) {
            case 'HMAC-SHA256':
                $sign = hash_hmac("sha256", $publicString, $this->appKey);
                break;
            default:
                $sign = md5($publicString);
        }
        return strtoupper($sign);
    }

    /**
     * @param array $parameters
     * @return string
     */
    public function getSignContent(array $parameters): string
    {
        return Arr::sortQuery($parameters) . '&key=' . $this->appKey;
    }

    /**
     * @param WechatRequest $request
     * @param string $mode
     * @throws Exception
     */
    public function execute(RequestInterface $request, string $mode = "APP"): ResponseInterface
    {
        // TODO: Implement execute() method.

        $systemParameters = [
            'sign_type' => $this->getSignType(),
            'appid' => $this->appId,
            'mch_id' => $this->merchantId,
            'nonce_str' => bin2hex(random_bytes(16))
        ];

        if (!empty(($notifyUrl = $request->getNotifyUrl()))) {
            $systemParameters['notify_url'] = $notifyUrl;
        }
        $allParameters = array_merge($systemParameters, $request->getApiParameters());
        if ($request instanceof WechatUnifiedOrderRequest && !isset($allParameters['trade_type'])) {
            $allParameters['trade_type'] = $mode;
        }
        $allParameters['sign'] = $this->sign($this->getSignContent($allParameters));
        $url = $this->getGatewayUrl() . $request->getApiMethodName();
        $response = $this->curl(
            $url, $allParameters, 'xml', [], ['isCert' => $request->isCert(), 'isCdata' => true]
        );
        return new WechatResponse(
            $this->formatResponse($response), $request->getApiMethodName(), $this->getResponseFormat()
        );
    }

    /**
     * @param string $responseString
     * @return mixed
     */
    protected function formatResponse(string $responseString)
    {
        if ($this->getResponseFormat() == 'json') {
            $response = Xml::simple($responseString);
            return json_decode(json_encode($response));
        }
        return parent::formatResponse($responseString); // TODO: Change the autogenerated stub
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
     * 通知校验
     *
     * @param $arguments
     * @return array 返回验证的签名的数据
     * @throws Exception
     */
    public function verification(array $arguments): array
    {
        // TODO: Implement verification() method.
        $xmlString = current($arguments);
        if (empty($xmlString)) {
            throw new Exception("通知数据为空");
        }
        $response = json_decode(json_encode(Xml::simple($xmlString)), true);
        if (empty($response)) {
            throw new Exception("通知数据解析失败");
        }
        if (empty($response['sign'])) {
            throw new Exception("无效签名");
        }
        $sign = $response['sign'];
        unset($response['sign']);
        if (strcmp($this->sign($this->getSignContent($response)), $sign) !== 0) {
            throw new Exception("签名验证失败");
        }
        return $response;
    }
}
