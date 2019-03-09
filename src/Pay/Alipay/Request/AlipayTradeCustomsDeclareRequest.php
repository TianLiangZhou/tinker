<?php

namespace Tinker\Pay\Alipay\Request;
use Tinker\Pay\Alipay\AlipayRequest;
/**
 * ALIPAY API: alipay.trade.customs.declare request
 *
 * @author auto create
 * @since 1.0, 2016-12-08 00:48:24
 */
class AlipayTradeCustomsDeclareRequest extends AlipayRequest
{
	/** 
	 * 统一收单报关接口
	 **/

	public function getApiMethodName(): string
	{
		return "alipay.trade.customs.declare";
	}

    public function check()
    {
        // TODO: Implement check() method.
    }
}
