<?php


namespace Tinker\Request\JD;


use Exception;
use Tinker\Request;

class JdUnionOpenPositionCreate extends Request
{

    /**
     * @var array
     */
    protected $positionReq = [
        "positionReq" => [
            'unionId' => '',
            'key' => '',
            'unionType' => 0,
            'type' => '',
            'spaceNameList' => '',
            'siteId' => '',
        ],
    ];

    /**
     * 需要创建的目标联盟id
     * 
     * @param string $unionId
     */
    public function setUnionId(string $unionId)
    {
        $this->positionReq['positionReq']['unionId'] = $unionId;
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
        $this->positionReq['positionReq']['siteId'] = $siteId;
    }

    /**
     * 目标联盟ID对应的授权key，在联盟推广管理页领取
     *
     * @param int $key
     */
    public function setKey(int $key)
    {
        $this->positionReq['positionReq']['key'] = $key;
    }

    /**
     * 1：cps推广位 2：cpc推广位
     *
     * @param int $unionType
     */
    public function setUnionType(int $unionType)
    {
        $this->positionReq['positionReq']['unionType'] = $unionType;
    }

    /**
     * 站点类型 1网站推广位2.APP推广位3.社交媒体推广位4.聊天工具推广位5.二维码推广
     *
     * @param int $type
     */
    public function setType(int $type)
    {
        $this->positionReq['positionReq']['type'] = $type;
    }

    /**
     * 推广位名称集合，英文,分割；上限50
     *
     * @param array $spaceNameList
     */
    public function setSpaceNameList(array $spaceNameList)
    {
        $this->positionReq['positionReq']['spaceNameList'] = $spaceNameList;
    }

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "jd.union.open.position.create";
    }

    /**
     *
     */
    public function setParamJson()
    {
        $this->setApiParameter('param_json', json_encode($this->getPositionReq()));
    }

    /**
     * @return array
     */
    public function getPositionReq()
    {
        return $this->positionReq;
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
