<?php

namespace Tinker\Pay\Alipay\Request;
use Tinker\Pay\Alipay\AlipayRequest;
/**
 * ALIPAY API: alipay.trade.pay request
 *
 * @author auto create
 * @since 1.0, 2018-08-31 11:20:00
 */
class AlipayTradePayRequest extends AlipayRequest
{
	/** 
	 * 用于在线下场景交易一次创建并支付掉
修改路由策略到R
	 **/
	public function getApiMethodName(): string
	{
		return "alipay.trade.pay";
	}

    public function check()
    {
        // TODO: Implement check() method.
    }
}
