<?php


namespace Tinker\PDD\Request;


use Exception;
use Tinker\Request;

/**
 * Class PddDdkMallUrlGen
 * @package Tinker\PDD\Request
 * @see https://open.pinduoduo.com/#/apidocument/port?id=pdd.ddk.rp.prom.url.generate
 */
class PddDdkMallUrlGen extends Request
{

    /**
     * @param int $id
     */
    public function setMallId(int $id)
    {
        $this->set('mall_id', $id);
    }

    /**
     * @param string $pid
     */
    public function setPid(string $pid)
    {
        $this->set('pid', $pid);
    }

    /**
     * @param bool $isWeapp
     */
    public function setGenerateWeappWebview(bool $isWeapp)
    {
        $this->set('generate_weapp_webview', $isWeapp ? 'true' : 'false');
    }

    /**
     * @param bool $isShortUrl
     */
    public function setGenerateShortUrl(bool $isShortUrl)
    {
        $this->set('generate_short_url', $isShortUrl ? 'true' : 'false');
    }

    /**
     * @param bool $isGroup
     */
    public function setMultiGroup(bool $isGroup)
    {
        $this->set('multi_group', $isGroup ? 'true' : 'false');
    }

    /**
     * @param string $custom
     */
    public function setCustomParameters(string $custom)
    {
        $this->set('custom_parameters', $custom ? 'true' : 'false');
    }


    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "pdd.ddk.mall.url.gen";

    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function check()
    {
        // TODO: Implement check() method.
    }
}
