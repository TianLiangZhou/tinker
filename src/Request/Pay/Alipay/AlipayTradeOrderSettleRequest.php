<?php

namespace Tinker\Request\Pay\Alipay;
use Tinker\Pay\Alipay\AlipayRequest;
/**
 * ALIPAY API: alipay.trade.order.settle request
 *
 * @author auto create
 * @since 1.0, 2018-07-13 17:18:06
 */
class AlipayTradeOrderSettleRequest extends AlipayRequest
{
	/** 
	 * 统一收单交易结算接口
	 **/

	public function getApiMethodName(): string
	{
		return "alipay.trade.order.settle";
	}

    public function check()
    {
        // TODO: Implement check() method.
    }
}
