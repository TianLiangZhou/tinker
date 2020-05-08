<?php


namespace Tinker\Request\JD;


use Exception;
use Tinker\Request;

class JdUnionOpenOrderQuery extends Request
{

    /**
     * @var array
     */
    protected $orderReq = [
        'orderReq' => [
            'pageNo' => 1,
            'pageSize' => 20,
            'type' => 1,
            'time' => '',
            'childUnionId' => 0,
            'key' => '',
        ]
    ];

    /**
     * @param int $pageNo
     */
    public function setPageNo(int $pageNo)
    {
        $this->orderReq['orderReq']['pageNo'] = $pageNo;
    }

    /**
     * @param int $pageSize
     */
    public function setPageSize(int $pageSize)
    {
        $this->orderReq['orderReq']['pageSize'] = $pageSize;
    }

    /**
     * @param int $type
     */
    public function setType(int $type)
    {
        $this->orderReq['orderReq']['type'] = $type;
    }

    /**
     * @param string $time
     */
    public function setTime(string $time)
    {
        $this->orderReq['orderReq']['time'] = $time;
    }

    /**
     * @param int $childUnionId
     */
    public function setChildUnionId(int $childUnionId)
    {
        $this->orderReq['orderReq']['childUnionId'] = $childUnionId;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key)
    {
        $this->orderReq['orderReq']['key'] = $key;
    }

    /**
     *
     */
    public function setParamJson()
    {
        $this->setApiParameter('param_json', json_encode($this->getOrderReq()));
    }


    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "jd.union.open.order.query";
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function check()
    {
        // TODO: Implement check() method.
    }

    /**
     * @return array
     */
    public function getOrderReq(): array
    {
        return $this->orderReq;
    }
}
