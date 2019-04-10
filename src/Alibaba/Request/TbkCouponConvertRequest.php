<?php


namespace Tinker\Alibaba\Request;


use Exception;
use Tinker\Request;

class TbkCouponConvertRequest extends Request
{

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "taobao.tbk.coupon.convert";
    }

    /**
     * 淘客商品id
     *
     * @param $itemId
     * @return $this
     */
    public function setItemId($itemId)
    {
        $this->setApiParameter('item_id', $itemId);

        return $this;
    }

    /**
     * 推广位id，mm_xx_xx_xx pid三段式中的第三段
     *
     * @param $adzoneId
     * @return $this
     */
    public function setAdzoneId($adzoneId)
    {
        $this->setApiParameter('adzone_id', $adzoneId);

        return $this;
    }

    /**
     * 1：PC，2：无线，默认：１
     *
     * @param $platform
     * @return $this
     */
    public function setPlatform($platform)
    {
        $this->setApiParameter('platform', $platform);

        return $this;
    }

    /**
     * 营销计划链接中的me参数
     *
     * @param $me
     * @return $this
     */
    public function setMe($me)
    {
        $this->setApiParameter('me', $me);

        return $this;
    }

    /**
     * 淘宝客推广链接
     *
     * @param $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->setApiParameter('url', $url);

        return $this;
    }

    /**
     * 物料块id
     *
     * @param $Xid
     * @return $this
     */
    public function setXId($Xid)
    {
        $this->setApiParameter('x_id', $Xid);

        return $this;
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
