<?php

namespace Tinker\Pay\Alipay\Request;
use Tinker\Pay\Alipay\AlipayRequest;
/**
 * ALIPAY API: alipay.trade.query request
 *
 * @author auto create
 * @since 1.0, 2018-05-11 18:28:47
 */
class AlipayTradeQueryRequest extends AlipayRequest
{
	/** 
	 * 统一收单线下交易查询
修改路由策略到R
	 **/
	public function getApiMethodName(): string
	{
		return "alipay.trade.query";
	}

    public function check()
    {
        // TODO: Implement check() method.
    }
}
