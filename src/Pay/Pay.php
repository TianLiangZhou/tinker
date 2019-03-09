<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018/11/10
 * Time: 16:18
 */

namespace Tinker\Pay;


use Tinker\Tinker;

/**
 * Class Pay
 * @package App\Services\Pay
 */
abstract class Pay extends Tinker implements PayInterface
{
    protected $appId = '';

    protected $appKey = '';

    protected $notifyUrl = '';

    protected $returnUrl = '';

    protected $encryptKey = '';

    public $systemCharset = 'UTF-8';


    /**
     * Pay constructor.
     * @param string $appId
     * @param null|string $appKey
     */
    public function __construct(string $appId, ?string $appKey = '')
    {
        $this->appId = $appId;

        $this->appKey= $appKey;
    }

    /**
     * 通知校验
     *
     * @param $result
     * @return mixed
     */
    abstract public function verification(array $result): array;

    /**
     * @param $value
     * @return string
     */
    public function convertCharset($value)
    {
        $charset = $this->getCharset();
        return mb_convert_encoding($value, $charset, $this->systemCharset);
    }

    /**
     * @return string
     */
    public function getEncryptKey(): string
    {
        return $this->encryptKey;
    }

    /**
     * @param string $encryptKey
     */
    public function setEncryptKey(string $encryptKey): PayInterface
    {
        $this->encryptKey = $encryptKey;
        return $this;
    }


    /**
     * @param string $url
     * @return PayInterface
     */
    public function setNotifyUrl(string $url): PayInterface
    {
        // TODO: Implement setNotifyUrl() method.
        $this->notifyUrl = $url;
        return $this;
    }

    /**
     * @param string $url
     * @return PayInterface
     */
    public function setReturnUrl(string $url): PayInterface
    {
        // TODO: Implement setReturnUrl() method.
        $this->returnUrl = $url;
        return $this;
    }


    /**
     * @return string
     */
    public function getNotifyUrl(): string
    {
        // TODO: Implement getNotifyUrl() method.
        return $this->notifyUrl;
    }

    /**
     * @return string
     */
    public function getReturnUrl(): string
    {
        // TODO: Implement getReturnUrl() method.
        return $this->returnUrl;
    }
}
