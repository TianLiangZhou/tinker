<?php

namespace Tinker\Pay\Alipay\Request;
use Tinker\Pay\Alipay\AlipayRequest;

/**
 * ALIPAY API: alipay.trade.page.pay request
 *
 * @author auto create
 * @since 1.0, 2018-08-14 15:31:43
 */
class AlipayTradePagePayRequest extends AlipayRequest
{
	/** 
	 * 统一收单下单并支付页面接口
	 **/

	public function getApiMethodName(): string
	{
		return "alipay.trade.page.pay";
	}

    public function check()
    {
        // TODO: Implement check() method.
    }
}
