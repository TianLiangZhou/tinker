<?php

namespace Tinker\Request\Pay\Alipay;
use Tinker\Pay\Alipay\AlipayRequest;

/**
 * ALIPAY API: alipay.trade.app.pay request
 *
 * @author auto create
 * @since 1.0, 2018-07-16 16:20:00
 */
class AlipayTradeAppPayRequest extends AlipayRequest
{
	public function getApiMethodName(): string
	{
		return "alipay.trade.app.pay";
	}

    public function check()
    {
        // TODO: Implement check() method.
    }
}
