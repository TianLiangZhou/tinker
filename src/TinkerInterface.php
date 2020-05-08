<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/10
 * Time: 16:17
 */

namespace Tinker;

interface TinkerInterface
{

    /**
     * @param RequestInterface $method
     * @param string $mode
     * @return ResponseInterface
     */
    public function execute(RequestInterface $method, string $mode = "default"): ResponseInterface;

    /**
     * @param string $charset
     * @return TinkerInterface
     */
    public function setCharset(string $charset):TinkerInterface;

    /**
     * @param string $format
     * @return TinkerInterface
     */
    public function setResponseFormat(string $format):TinkerInterface;

    /**
     * @return string
     */
    public function getCharset(): string;

    /**
     * @return string
     */
    public function getResponseFormat(): string;

    /**
     * @return string
     */
    public function getGatewayUrl(): string;

    /**
     * @param string $signType
     * @return TinkerInterface
     */
    public function setSignType(string $signType):TinkerInterface;

    /**
     * @return string
     */
    public function getSignType(): string;

    /**
     * @return bool
     */
    public function isCheck(): bool;

}
