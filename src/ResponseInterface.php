<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018-12-24
 * Time: 09:29
 */

namespace Tinker;


interface ResponseInterface
{

    /**
     * 是否成功
     *
     * @return bool
     */
    public function isSuccess(): bool;

    /**
     * 返回的结果实体
     *
     * @return mixed
     */
    public function getBody($isRaw = false);

    /**
     * 获取错误信息
     *
     * @return string
     */
    public function errorMessage(): string;

    /**
     * 最后出错的错误码
     *
     * @return mixed
     */
    public function lastErrorCode();
}
