<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/12
 * Time: 22:42
 */

namespace Tinker\Request\Pay\Wechat;


use Tinker\Pay\Wechat\WechatRequest;

class WechatReportRequest extends WechatRequest
{

    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "/payitil/report";
    }

    public function setInterfaceUrl(string $url)
    {
        $this->setApiParameter('interface_url', $url);
        return $this;
    }

    public function setReturnCode(int $code)
    {
        $this->setApiParameter('return_code', $code);
        return $this;
    }

    public function setResultCode(int $code)
    {
        $this->setApiParameter('result_code', $code);
        return $this;
    }

    public function setUserIp(string $ip)
    {
        $this->setApiParameter('user_ip', $ip);
        return $this;
    }

    public function setExecuteTime(string $time)
    {
        $this->setApiParameter('execute_time', $time);
        return $this;
    }

    public function check()
    {
        // TODO: Implement check() method.
    }
}
