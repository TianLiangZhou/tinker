<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/10
 * Time: 16:17
 */

namespace Tinker\Pay;


use Tinker\TinkerInterface;

interface PayInterface extends TinkerInterface
{

    /**
     * @param string $url
     * @return PayInterface
     */
    public function setNotifyUrl(string $url): PayInterface;

    /**
     * @return string
     */
    public function getNotifyUrl(): string;

    /**
     * @param string $url
     * @return PayInterface
     */
    public function setReturnUrl(string $url): PayInterface;

    /**
     * @return string
     */
    public function getReturnUrl(): string;

}
