<?php

namespace Tinker\Request\Pay\Alipay;
use Tinker\Pay\Alipay\AlipayRequest;
/**
 * ALIPAY API: alipay.trade.cancel request
 *
 * @author auto create
 * @since 1.0, 2018-07-13 17:18:06
 */
class AlipayTradeCancelRequest extends AlipayRequest
{
	/** 
	 * 统一收单交易撤销接口
	 **/

	public function getApiMethodName(): string
	{
		return "alipay.trade.cancel";
	}

    public function check()
    {
        // TODO: Implement check() method.
    }
}
