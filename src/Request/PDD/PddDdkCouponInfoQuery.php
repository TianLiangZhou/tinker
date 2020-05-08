<?php


namespace Tinker\Request\PDD;


use Exception;
use Tinker\Request;

/**
 * Class PddDdkCouponInfoQuery
 * @package Tinker\PDD\Request
 * @see https://open.pinduoduo.com/#/apidocument/port?id=pdd.ddk.coupon.info.query
 */
class PddDdkCouponInfoQuery extends Request
{

    /**
     * @param $couponId
     */
    public function setCouponIds($couponId)
    {
        $this->set('coupon_ids', "[$couponId]");
    }

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "pdd.ddk.coupon.info.query";
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
