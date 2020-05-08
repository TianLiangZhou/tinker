<?php

namespace Tinker\Request\Pay\Alipay;
use Tinker\Pay\Alipay\AlipayRequest;
/**
 * ALIPAY API: alipay.trade.refund request
 *
 * @author auto create
 * @since 1.0, 2018-09-01 17:20:00
 */
class AlipayTradeRefundRequest extends AlipayRequest
{
	/** 
	 * 统一收单交易退款接口
	 **/
	public function getApiMethodName(): string
	{
		return "alipay.trade.refund";
	}

    public function check()
    {
        // TODO: Implement check() method.
    }
}
