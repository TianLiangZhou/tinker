<?php


namespace Tinker\PDD\Request;


use Exception;
use Tinker\Request;

/**
 * Class PddDdkGoodsPromotionUrlGenerate
 * @package Tinker\PDD\Request
 * @see https://open.pinduoduo.com/#/apidocument/port?id=pdd.ddk.goods.detail
 */
class PddDdkGoodsPromotionUrlGenerate extends Request
{

    /**
     * @param string $pid
     */
    public function setPid(string $pid)
    {
        $this->set('p_id', $pid);
    }

    /**
     * @param int $id
     */
    public function setGoodsIdList(int $id)
    {
        $this->set('goods_id_list', "[$id]");
    }

    /**
     * @param bool $isShort
     */
    public function setGenerateShortUrl(bool $isShort)
    {
        $this->set('generate_short_url', $isShort);
    }

    /**
     * @param bool $isGroup
     */
    public function setMultiGroup(bool $isGroup)
    {
        $this->set('multi_group', $isGroup);
    }

    /**
     * @param string $custom
     */
    public function setCustomParameters(string $custom)
    {
        $this->set('custom_parameters', $custom);
    }

    /**
     * @param bool $isWeApp
     */
    public function setGenerateWeappWebview(bool $isWeApp)
    {
        $this->set('generate_weapp_webview', $isWeApp);
    }

    /**
     * @param int $id
     */
    public function setZsDuoId(int $id)
    {
        $this->set('zs_duo_id', $id);
    }

    /**
     * @param bool $isWeApp
     */
    public function setGenerateWeApp(bool $isWeApp)
    {
        $this->set('generate_we_app', $isWeApp);
    }

    /**
     * @param bool $isWeiApp
     */
    public function setGenerateWeiboappWebview(bool $isWeiApp)
    {
        $this->set('generate_weiboapp_webview', $isWeiApp);
    }


    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "pdd.ddk.goods.promotion.url.generate";
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
