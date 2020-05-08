<?php

namespace Tinker\Request\Pay\Alipay;
use Tinker\Pay\Alipay\AlipayRequest;
/**
 * ALIPAY API: alipay.trade.vendorpay.devicedata.upload request
 *
 * @author auto create
 * @since 1.0, 2016-12-08 00:51:39
 */
class AlipayTradeVendorpayDevicedataUploadRequest extends AlipayRequest
{
	/** 
	 * 厂商支付授权时上传设备数据接口，目前主要包含三星支付。com
	 **/
	public function getApiMethodName(): string
	{
		return "alipay.trade.vendorpay.devicedata.upload";
	}

    public function check()
    {
        // TODO: Implement check() method.
    }
}
