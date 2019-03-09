<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/10
 * Time: 16:43
 */

namespace Tinker\Pay;


use Tinker\Request;

abstract class PayRequest extends Request  implements PayRequestInterface
{
    protected $returnUrl = '';

    protected $notifyUrl = '';

    public function setReturnUrl(string $url): PayRequestInterface
    {
        // TODO: Implement setReturnUrl() method.
        $this->returnUrl = $url;
        return $this;
    }

    public function setNotifyUrl(string $url): PayRequestInterface
    {
        // TODO: Implement setNotifyUrl() method.
        $this->notifyUrl = $url;
        return $this;
    }

    public function getNotifyUrl(): string
    {
        // TODO: Implement getNotifyUrl() method.
        return $this->notifyUrl;
    }

    public function getReturnUrl(): string
    {
        // TODO: Implement getReturnUrl() method.
        return $this->returnUrl;
    }
}
