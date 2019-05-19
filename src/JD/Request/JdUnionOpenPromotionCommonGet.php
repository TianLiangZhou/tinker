<?php


namespace Tinker\JD\Request;


use Exception;
use Tinker\Request;

class JdUnionOpenPromotionCommonGet extends Request
{

    /**
     * @var array
     */
    protected $promotionCodeReq = [
        "promotionCodeReq" => [
            'materialId' => '',
            'siteId' => '',
            'positionId' => 0,
            'subUnionId' => '',
            'ext1' => '',
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
     * @param string $siteId
     */
    public function setSiteId(string $siteId)
    {
        $this->promotionCodeReq['promotionCodeReq']['siteId'] = $siteId;
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
     * @param string $ext1
     */
    public function setExt1(string $ext1)
    {
        $this->promotionCodeReq['promotionCodeReq']['ext1'] = $ext1;
    }

    /**
     * @param string $pid
     */
    public function setPid(string $pid)
    {
        $this->promotionCodeReq['promotionCodeReq']['pid'] = $pid;
    }


    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "jd.union.open.promotion.common.get";
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
