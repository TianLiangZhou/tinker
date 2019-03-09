<?php

namespace Tinker\Pay\Alipay\Request;
use Tinker\Pay\Alipay\AlipayRequest;
/**
 * ALIPAY API: alipay.trade.close request
 *
 * @author auto create
 * @since 1.0, 2018-07-13 17:18:06
 */
class AlipayTradeCloseRequest extends AlipayRequest
{
	/** 
	 * 统一收单交易关闭接口
	 **/

	public function getApiMethodName(): string
	{
		return "alipay.trade.close";
	}

    public function check()
    {
        // TODO: Implement check() method.
    }
}
