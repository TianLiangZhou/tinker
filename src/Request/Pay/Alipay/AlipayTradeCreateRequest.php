<?php

namespace Tinker\Request\Pay\Alipay;
use Tinker\Pay\Alipay\AlipayRequest;
/**
 * ALIPAY API: alipay.trade.create request
 *
 * @author auto create
 * @since 1.0, 2018-09-01 17:05:01
 */
class AlipayTradeCreateRequest extends AlipayRequest
{
	/** 
	 * 商户通过该接口进行交易的创建下单
	 **/
	public function getApiMethodName(): string
	{
		return "alipay.trade.create";
	}

    public function check()
    {
        // TODO: Implement check() method.
    }
}
