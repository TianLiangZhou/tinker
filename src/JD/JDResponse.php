<?php


namespace Tinker\JD;


use stdClass;
use Tinker\TinkerResponse;

class JDResponse extends TinkerResponse
{
    /**
     * TaobaoResponse constructor.
     * @param $body
     * @param string $method
     * @param string $format
     */
    public function __construct($body, string $method, string $format = 'json')
    {
        parent::__construct($body, $method, $format);
        $this->addMethodBodyReplace('.', '_');
        $search = array_keys($this->methodBodyReplace);
        $value = array_values($this->methodBodyReplace);
        $property = str_replace($search, $value, $this->method) . '_response';
        if (isset($this->body->$property)) {
            $this->body->$property->result = json_decode($this->body->$property->result);
        }
    }

    /**
     * 是否成功
     *
     * @return bool
     */
    public function isSuccess(): bool
    {
        // TODO: Implement isSuccess() method.
        $body = $this->getBody();
        if (isset($body->result->code) && $body->result->code == 200) {
            return true;
        }
        return false;
    }

    /**
     * @return stdClass|null
     */
    public function getJsonBody(): ?stdClass
    {
        return $this->getMethodBody();
    }

    /**
     * 获取错误信息
     *
     * @return string
     */
    public function errorMessage(): string
    {
        // TODO: Implement errorMessage() method.
        $body = $this->getBody();
        if (isset($body->result->message)) {
            return $body->result->message;
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
        $body = $this->getBody();
        if (isset($body->result->code) && $body->result->code != 200) {
            return $body->result->code;
        }
        return 500;
    }
}
