<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/10
 * Time: 16:27
 */

namespace Tinker\Pay;


use Tinker\RequestInterface;

interface PayRequestInterface extends RequestInterface
{

    public function setNotifyUrl(string $url): PayRequestInterface;

    public function getNotifyUrl(): string;

    public function setReturnUrl(string $url): PayRequestInterface;

    public function getReturnUrl(): string;
}
