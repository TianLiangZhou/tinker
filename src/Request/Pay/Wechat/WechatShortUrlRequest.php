<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/12
 * Time: 22:43
 */

namespace Tinker\Request\Pay\Wechat;


use Tinker\Pay\Wechat\WechatRequest;

class WechatShortUrlRequest extends WechatRequest
{

    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "/tools/shorturl";
    }

    public function setLongUrl(string $url)
    {
        $this->setApiParameter('long_url', $url);
        return $this;
    }

    public function check()
    {
        // TODO: Implement check() method.
    }
}
