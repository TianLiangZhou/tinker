<?php


namespace Tinker\Request\JD;


use Exception;
use Tinker\Request;

class JdUnionOpenUserPidGet extends Request
{

    /**
     * @var array
     */
    protected $pidReq = [
        "pidReq" => [
            'unionId' => 0,
            'childUnionId' => 0,
            'promotionType' => 0,
            'positionName' => '',
            'mediaName' => '',
        ],
    ];

    /**
     * 需要创建的目标联盟id
     *
     * @param int $unionId
     */
    public function setUnionId(int $unionId)
    {
        $this->pidReq['pidReq']['unionId'] = $unionId;
    }

    /**
     * 子站长ID
     *
     * @param int $childUnionId
     */
    public function setChildUnionId(int $childUnionId)
    {
        $this->pidReq['pidReq']['childUnionId'] = $childUnionId;
    }

    /**
     * 子站长的推广位名称，如不存在则创建，不填则由联盟根据母账号信息创建
     *
     * @param string $positionName
     */
    public function setUnionType(string $positionName)
    {
        $this->pidReq['pidReq']['positionName'] = $positionName;
    }

    /**
     * 推广类型,1APP推广 2聊天工具推广
     *
     * @param int $promotionType
     */
    public function setPromotionType(int $promotionType)
    {
        $this->pidReq['pidReq']['promotionType'] = $promotionType;
    }

    /**
     * 媒体名称，即子站长的app应用名称，推广方式为app推广时必填，且app名称必须为已存在的app名称
     *
     * @param $mediaName
     */
    public function setMediaName($mediaName)
    {

        $this->pidReq['pidReq']['mediaName'] = $mediaName;
    }

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "jd.union.open.user.pid.get";
    }

    /**
     *
     */
    public function setParamJson()
    {
        $this->setApiParameter('param_json', json_encode($this->getPidReq()));
    }

    /**
     * @return array
     */
    public function getPidReq()
    {
        return $this->pidReq;
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
