<?php


namespace Tinker\Request\PDD;


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
     * @param array $id
     */
    public function setGoodsIdList(array $id)
    {
        $this->set('goods_id_list', json_encode($id));
    }

    /**
     * @param bool $isShort
     */
    public function setGenerateShortUrl(bool $isShort)
    {
        $this->set('generate_short_url', $isShort ? 'true' : 'false');
    }

    /**
     * rue--生成多人团推广链接 false--生成单人团推广链接（默认false）
     * 1、单人团推广链接：用户访问单人团推广链接，可直接购买商品无需拼团。
     * 2、多人团推广链接：用户访问双人团推广链接开团，若用户分享给他人参团，则开团者和参团者的佣金均结算给推手
     * 
     * @param bool $isGroup
     */
    public function setMultiGroup(bool $isGroup)
    {
        $this->set('multi_group', $isGroup ? 'true' : 'false');
    }

    /**
     * 自定义参数，为链接打上自定义标签；自定义参数最长限制64个字节；
     * 格式为： {"uid":"11111","sid":"22222"} ，其中 uid 用户唯一标识，可自行加密后传入，每个用户仅且对应一个标识，
     * 必填； sid 上下文信息标识，例如sessionId等，非必填。该json字符串中也可以加入其他自定义的key
     * 
     * @param string $custom
     */
    public function setCustomParameters(string $custom)
    {
        $this->set('custom_parameters', $custom);
    }

    /**
     * 是否生成唤起微信客户端链接，true-是，false-否，默认false
     * 
     * @param bool $isWeApp
     */
    public function setGenerateWeappWebview(bool $isWeApp)
    {
        $this->set('generate_weapp_webview', $isWeApp ? 'true' : 'false');
    }

    /**
     * 是否生成qq小程序
     * 
     * @param bool $isQQ
     */
    public function setGenerateQQApp(bool $isQQ)
    {
        $this->set('generate_qq_app', $isQQ ?  'true' : 'false');
    }

    /**
     * 是否返回 schema URL
     * 
     * @param bool $isApp
     */
    public function setGenerateSchemaUrl(bool $isApp)
    {
        $this->set('generate_schema_url', $isApp ? 'true' : 'false');
    }
    
    /**
     * @param int $id
     */
    public function setZsDuoId(int $id)
    {
        $this->set('zs_duo_id', $id);
    }

    /**
     * 是否生成小程序推广
     *
     * @param bool $isWeApp
     */
    public function setGenerateWeApp(bool $isWeApp)
    {
        $this->set('generate_we_app', $isWeApp ? 'true' : 'false');
    }

    /**
     * 是否生成微博推广链接
     *
     * @param bool $isWeiApp
     */
    public function setGenerateWeiboappWebview(bool $isWeiApp)
    {
        $this->set('generate_weiboapp_webview', $isWeiApp ? 'true' : 'false');
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
