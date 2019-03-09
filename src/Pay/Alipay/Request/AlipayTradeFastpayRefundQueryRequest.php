<?php

namespace Tinker\Pay\Alipay\Request;
use Tinker\Pay\Alipay\AlipayRequest;
/**
 * ALIPAY API: alipay.trade.fastpay.refund.query request
 *
 * @author auto create
 * @since 1.0, 2018-07-25 17:25:00
 */
class AlipayTradeFastpayRefundQueryRequest extends AlipayRequest
{
	/** 
	 * 商户可使用该接口查询自已通过alipay.trade.refund提交的退款请求是否执行成功。
	 **/

	public function getApiMethodName(): string
	{
		return "alipay.trade.fastpay.refund.query";
	}

    public function check()
    {
        // TODO: Implement check() method.
    }
}
