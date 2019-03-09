<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/12
 * Time: 22:24
 */

namespace Tinker\Pay\Wechat\Request;


use Tinker\Pay\Wechat\WechatRequest;

/**
 * 统一下单接口
 *
 * @see https://pay.weixin.qq.com/wiki/doc/api/app/app.php?chapter=9_1
 * Class WechatUnifiedOrderRequest
 * @package Tinker\Pay\Wechat\Request
 */
class WechatUnifiedOrderRequest extends WechatRequest
{

    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "/pay/unifiedorder";
    }

    public function setOutTradeNo(string $orderId)
    {
        $this->setApiParameter('out_trade_no', $orderId);
        return $this;
    }

    public function setBody(string $body)
    {
        $this->setApiParameter('body', $body);
        return $this;
    }

    public function setTotalFee(int $fee)
    {
        $this->setApiParameter('total_fee', $fee);
        return $this;
    }

    public function setTradeType(string $type)
    {
        $this->setApiParameter('trade_type', strtoupper($type));
        return $this;
    }

    public function setDetail(string $detail)
    {
        $this->setApiParameter('detail', $detail);
        return $this;
    }

    public function setFeeType(string $type)
    {
        $this->setApiParameter('fee_type', $type);
        return $this;
    }

    public function setOpenId(string $openId)
    {
        $this->setApiParameter('openid', $openId);
        return $this;
    }

    public function setProductId(string $productId)
    {
        $this->setApiParameter('product_id', $productId);
        return $this;
    }

    public function setIp(string $ip)
    {
        $this->setApiParameter('spbill_create_ip', $ip);
        return $this;
    }

    public function setTimeExpire(string $expire)
    {
        $this->setApiParameter('time_expire', $expire);
        return $this;
    }

    public function check()
    {
        // TODO: Implement check() method.
    }
}
