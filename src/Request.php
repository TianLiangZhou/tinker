<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/10
 * Time: 16:43
 */

namespace Tinker;

/**
 * Class Request
 * @package Tinker
 */
abstract class Request extends ParameterBag implements RequestInterface
{

    /**
     * @param array $bizContent
     * @return RequestInterface
     */
    public function setBizContent(array $bizContent): RequestInterface
    {
        // TODO: Implement setBizContent() method.
        foreach ($bizContent as $name => $value) {
            $this->setApiParameter($name, $value);
        }
        return $this;
    }

    /**
     * @param string $name
     * @param string $value
     * @return RequestInterface
     */
    public function setApiParameter(string $name, string $value): RequestInterface
    {
        // TODO: Implement setContent() method.
        $this->set($name, $value);
        return $this;
    }

    /**
     * @return array
     */
    public function getApiParameters(): array
    {
        // TODO: Implement getContent() method.
        return $this->all();
    }
}
