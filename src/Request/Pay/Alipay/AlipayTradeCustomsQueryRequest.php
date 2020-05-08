<?php

namespace Tinker\Request\Pay\Alipay;
use Tinker\Pay\Alipay\AlipayRequest;
/**
 * ALIPAY API: alipay.trade.customs.query request
 *
 * @author auto create
 * @since 1.0, 2018-03-02 14:37:16
 */
class AlipayTradeCustomsQueryRequest extends AlipayRequest
{
	/** 
	 * 查询报关详细信息
	 **/

	public function getApiMethodName(): string
	{
		return "alipay.trade.customs.query";
	}

    public function check()
    {
        // TODO: Implement check() method.
    }
}
