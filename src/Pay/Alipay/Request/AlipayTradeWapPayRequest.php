<?php

namespace Tinker\Pay\Alipay\Request;
use Tinker\Pay\Alipay\AlipayRequest;

/**
 * ALIPAY API: alipay.trade.wap.pay request
 *
 * @author auto create
 * @since 1.0, 2018-08-06 12:35:00
 */
class AlipayTradeWapPayRequest extends AlipayRequest
{
	/** 
	 * 手机网站支付接口2.0
	 **/

	public function getApiMethodName(): string
	{
		return "alipay.trade.wap.pay";
	}

    public function check()
    {
        // TODO: Implement check() method.
    }
}
