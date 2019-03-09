<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/10
 * Time: 21:01
 */

namespace Tinker\Pay\Wechat;


use Tinker\Pay\PayRequest;

abstract class WechatRequest extends PayRequest
{
    protected $isCert = false;

    /**
     * 检测是否开启了证书验证
     *
     * @return bool
     */
    public function isCert(): bool
    {
        return $this->isCert;
    }

    /**
     * 设置证书认证
     *
     * @param bool $isCert
     * @return WechatRequest
     */
    public function setCert(bool $isCert): WechatRequest
    {
        $this->isCert = $isCert;
        return $this;
    }
}
