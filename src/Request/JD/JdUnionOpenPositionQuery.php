<?php


namespace Tinker\Request\JD;


use Exception;
use Tinker\Request;

class JdUnionOpenPositionQuery extends Request
{

    /**
     * @var array
     */
    protected $positionReq = [
        "positionReq" => [
            'unionId' => '',
            'key' => '',
            'unionType' => 0,
            'pageIndex' => '',
            'pageSize' => '',
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
     * @param int $pageIndex
     */
    public function setpageIndex(int $pageIndex = 1)
    {
        $this->positionReq['positionReq']['pageIndex'] = $pageIndex;
    }

    /**
     * 每页条数，上限100
     *
     * @param int $pageSize
     */
    public function setPageSize(int $pageSize)
    {
        $this->positionReq['positionReq']['pageSize'] = $pageSize;
    }

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "jd.union.open.position.query";
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
