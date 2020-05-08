<?php

namespace Tinker\Request\Pay\Alipay;
use Tinker\Pay\Alipay\AlipayRequest;
/**
 * ALIPAY API: alipay.trade.orderinfo.sync request
 *
 * @author auto create
 * @since 1.0, 2018-07-23 11:40:00
 */
class AlipayTradeOrderinfoSyncRequest extends AlipayRequest
{
	/** 
	 * 支付宝订单信息同步接口
	 **/
	public function getApiMethodName(): string
	{
		return "alipay.trade.orderinfo.sync";
	}

    public function check()
    {
        // TODO: Implement check() method.
    }
}
