<?php


namespace Tinker\Request\JD;


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
            'pid' => '',
            'couponUrl' => '',
            'giftCouponKey' => '',
        ],
    ];

    /**
     * 推广物料 如:https://item.jd.com/23484023378.html
     * 
     * @param string $materialId
     */
    public function setMaterialId(string $materialId)
    {
        $this->promotionCodeReq['promotionCodeReq']['materialId'] = $materialId;
    }

    /**
     * 站点ID是指在联盟后台的推广管理中的网站Id、APPID（
     * 1、通用转链接口禁止使用社交媒体id入参；
     * 2、订单来源，即投放链接的网址或应用必须与传入的网站ID/AppID备案一致，否则订单会判“无效-来源与备案网址不符”
     * 
     * @param string $siteId
     */
    public function setSiteId(string $siteId)
    {
        $this->promotionCodeReq['promotionCodeReq']['siteId'] = $siteId;
    }

    /**
     * 推广位id
     *
     * @param int $positionId
     */
    public function setPositionId(int $positionId)
    {
        $this->promotionCodeReq['promotionCodeReq']['positionId'] = $positionId;
    }

    /**
     * 子联盟ID（需申请，申请方法请见https://union.jd.com/helpcenter/13246-13247-46301），该字段为自定义参数，建议传入字母数字和下划线的格式
     * 
     * @param string $subUnionId
     */
    public function setSubUnionId(string $subUnionId)
    {
        $this->promotionCodeReq['promotionCodeReq']['subUnionId'] = $subUnionId;
    }

    /**
     * 系统扩展参数，无需传入
     * 
     * @param string $ext1
     */
    public function setExt1(string $ext1)
    {
        $this->promotionCodeReq['promotionCodeReq']['ext1'] = $ext1;
    }

    /**
     * 联盟子站长身份标识，格式：子站长ID_子站长网站ID_子站长推广位ID
     * 
     * @param string $pid
     */
    public function setPid(string $pid)
    {
        $this->promotionCodeReq['promotionCodeReq']['pid'] = $pid;
    }

    /**
     * 优惠券领取链接，在使用优惠券、商品二合一功能时入参，且materialId须为商品详情页链接
     * 
     * @param string $couponUrl
     */
    public function setCouponUrl(string $couponUrl)
    {
        $this->promotionCodeReq['promotionCodeReq']['couponUrl'] = $couponUrl;
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
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "jd.union.open.promotion.common.get";
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
