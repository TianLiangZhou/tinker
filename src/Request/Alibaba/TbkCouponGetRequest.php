<?php


namespace Tinker\Request\Alibaba;

use Tinker\Request;

class TbkCouponGetRequest extends Request
{
    public function getApiMethodName(): string
    {
        return "taobao.tbk.coupon.get";
    }

    /**
     * 带券ID与商品ID的加密串
     *
     * @param string $me
     * @return $this
     */
    public function setMe(string $me)
    {
        $this->setApiParameter('me', $me);

        return $this;
    }

    /**
     * 	商品ID
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
     * 券ID
     *
     * @param string $activityId
     * @return $this
     */
    public function setActivityId(string $activityId)
    {

        $this->setApiParameter('activity_id', $activityId);

        return $this;
    }

    public function check()
    {

    }
}
