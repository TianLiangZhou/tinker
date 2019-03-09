<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/10
 * Time: 16:27
 */

namespace Tinker;


use Exception;

/**
 * Interface RequestInterface
 * @package Tinker
 */
interface RequestInterface
{

    /**
     * @param array $bizContent
     * @return RequestInterface
     */
    public function setBizContent(array $bizContent): RequestInterface;

    /**
     * @param string $name
     * @param string $value
     * @return RequestInterface
     */
    public function setApiParameter(string $name, string $value): RequestInterface;

    /**
     * @return array
     */
    public function getApiParameters(): array;

    /**
     * @return string
     */
    public function getApiMethodName(): string;

    /**
     * @throws Exception
     * @return mixed
     */
    public function check();
}
