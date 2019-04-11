<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018-12-24
 * Time: 09:37
 */

namespace Tinker\Pay\Wechat;


use Tinker\TinkerResponse;

class WechatResponse extends TinkerResponse
{

    /**
     * 是否成功
     *
     * @return bool
     */
    public function isSuccess(): bool
    {
        // TODO: Implement isSuccess() method.
        if (empty($this->body)) {
            return false;
        }
        if ($this->body->return_code !== 'SUCCESS') {
            return false;
        }
        if ($this->body->result_code !== 'SUCCESS') {
            return false;
        }
        return true;
    }

    /**
     * 获取错误信息
     * @return string
     */
    public function errorMessage(): string
    {
        // TODO: Implement errorMessage() method.
        if (isset($this->body->return_msg)) {
            return $this->body->return_msg;
        }
        return 'unknown';
    }

    /**
     * 最后出错的错误码
     *
     * @return mixed
     */
    public function lastErrorCode()
    {
        // TODO: Implement lastErrorCode() method.
        return $this->body->err_code ?? 'unknown';
    }
}
