<?php


namespace Tinker\Request\PDD;


use Exception;
use Tinker\Request;

/**
 * Class PddDdkGoodsPromotionUrlGenerate
 * @package Tinker\PDD\Request
 * @see https://open.pinduoduo.com/#/apidocument/port?id=pdd.ddk.goods.detail
 */
class PddDdkWeappQrcodeUrlGen extends Request
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
     * 自定义参数，为链接打上自定义标签；自定义参数最长限制64个字节；
     * 格式为： {"uid":"11111","sid":"22222"} ，
     * 其中 uid 用户唯一标识，可自行加密后传入，每个用户仅且对应一个标识，
     * 必填； sid 上下文信息标识，例如sessionId等，非必填。该json字符串中也可以加入其他自定义的key
     *
     * @param string $custom
     */
    public function setCustomParameters(string $custom)
    {
        $this->set('custom_parameters', $custom);
    }

    /**
     * 是否生成店铺收藏券推广链接
     *
     * @param bool $isMall
     */
    public function setGenerateMallCollectCoupon(bool $isMall)
    {
        $this->set('generate_mall_collect_coupon', $isMall ? 'true' : 'false');
    }

    /**
     * @param int $id
     */
    public function setZsDuoId(int $id)
    {
        $this->set('zs_duo_id', $id);
    }



    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "pdd.ddk.weapp.qrcode.url.gen";
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
