<?php

namespace Tinker\Request\JD;

use Exception;
use Tinker\Request;

/**
 * Class JdUnionOpenOrderRowQuery
 * @package Tinker\Request\JD
 * @see https://union.jd.com/openplatform/api/12707
 */
class JdUnionOpenOrderRowQuery extends Request
{

    /**
     * @var array
     */
    protected $orderReq = [
        'orderReq' => [
            'pageIndex' => 1,
            'pageSize' => 20,
            'type' => 1,
            'startTime' => '',
            'endTime' => '',
            'childUnionId' => 0,
            'key' => '',
            'fields' => '',
        ]
    ];

    /**
     * @param int $pageIndex
     */
    public function setPageIndex(int $pageIndex)
    {
        $this->orderReq['orderReq']['pageIndex'] = $pageIndex;
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
    public function setStartTime(string $time)
    {
        $this->orderReq['orderReq']['startTime'] = $time;
    }

    /**
     * @param string $time
     */
    public function setEndTime(string $time)
    {
        $this->orderReq['orderReq']['endTime'] = $time;
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
     * @param string $fields
     */
    public function setFields(string $fields)
    {
        $this->orderReq['orderReq']['fields'] = $fields;
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
        return "jd.union.open.order.row.query";
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
