<?php


namespace Tinker\Request\JD;


use Exception;
use Tinker\Request;

/**
 * Class JdUnionOpenPromotionByunionidGet
 * @package Tinker\JD\Request
 */
class JdUnionOpenPromotionByunionidGet extends Request
{
    /**
     * @var array
     */
    protected $promotionCodeReq = [
        "promotionCodeReq" => [
            'materialId' => '',
            'unionId' => '',
            'positionId' => 0,
            'subUnionId' => '',
            'couponUrl' => '',
            'chainType' => 3,
            'pid' => ''
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
     * @param string $unionId
     */
    public function setUnionId(string $unionId)
    {
        $this->promotionCodeReq['promotionCodeReq']['unionId'] = $unionId;
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
     * @param int $type
     */
    public function setChainType(int $type)
    {
        $this->promotionCodeReq['promotionCodeReq']['chainType'] = $type;
    }

    /**
     * @param string $pid
     */
    public function setPid(string $pid)
    {
        $this->promotionCodeReq['promotionCodeReq']['pid'] = $pid;
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
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "jd.union.open.promotion.byunionid.get";
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
