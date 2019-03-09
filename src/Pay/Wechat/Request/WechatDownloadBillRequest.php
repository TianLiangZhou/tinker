<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/12
 * Time: 22:38
 */

namespace Tinker\Pay\Wechat\Request;


use Tinker\Pay\Wechat\WechatRequest;

class WechatDownloadBillRequest extends WechatRequest
{

    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "/pay/downloadbill";
    }

    public function setBillDate(string $date)
    {
        $this->setApiParameter('bill_date', $date);
        return $this;
    }

    public function setDeviceInfo(string $device)
    {
        $this->setApiParameter('device_info', $device);
        return $this;
    }

    public function check()
    {
        // TODO: Implement check() method.
    }
}
