<?php


namespace Tinker\Request\JD;


use Exception;
use Tinker\Request;

class JdUnionOpenPromotionBysubunionidGet extends Request
{

    /**
     * @var array
     */
    protected $promotionCodeReq = [
        "promotionCodeReq" => [
            'materialId' => '',
            'subUnionId' => '',
            'positionId' => 0,
            'couponUrl' => '',
            'pid' => '',
            'chainType' => 3,
            'giftCouponKey' => '',
        ],
    ];

    /**
     * @param string $materialId
     */
    public function setMaterialId(string $materialId)
    {
        $this->promotionCodeReq['promotionCodeReq']['materialId'] = $materialId;
    }

    /**
     * @param int $positionId
     */
    public function setPositionId(int $positionId)
    {
        $this->promotionCodeReq['promotionCodeReq']['positionId'] = $positionId;
    }

    /**
     * @param string $subUnionId
     */
    public function setSubUnionId(string $subUnionId)
    {
        $this->promotionCodeReq['promotionCodeReq']['subUnionId'] = $subUnionId;
    }

    /**
     * @param string $couponUrl
     */
    public function setCouponUrl(string $couponUrl)
    {
        $this->promotionCodeReq['promotionCodeReq']['couponUrl'] = $couponUrl;
    }

    /**
     * @param string $pid
     */
    public function setPid(string $pid)
    {
        $this->promotionCodeReq['promotionCodeReq']['pid'] = $pid;
    }

    /**
     * 礼金批次号
     *
     * @param string $giftCouponKey
     */
    public function setGiftCouponKey(string $giftCouponKey)
    {
        $this->promotionCodeReq['promotionCodeReq']['giftCouponKey'] = $giftCouponKey;
    }

    /**
     * @param int $type
     */
    public function setChainType(int $type)
    {
        $this->promotionCodeReq['promotionCodeReq']['chainType'] = $type;
    }

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "jd.union.open.promotion.bysubunionid.get";
    }

    /**
     *
     */
    public function setParamJson()
    {
        $this->setApiParameter('param_json', json_encode($this->getPromotionCodeReq()));
    }

    /**
     * @return array
     */
    public function getPromotionCodeReq()
    {
        return $this->promotionCodeReq;
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
