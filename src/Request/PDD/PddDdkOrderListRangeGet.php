<?php


namespace Tinker\Request\PDD;


use Exception;
use Tinker\Request;

/**
 * Class PddDdkOrderDetailGet
 * @package Tinker\PDD\Request
 *
 * @see https://open.pinduoduo.com/#/apidocument/port?portId=pdd.ddk.order.list.range.get
 */
class PddDdkOrderListRangeGet extends Request
{
    /**
     * @param int $pageSize
     */
    public function setPageSize(int $pageSize)
    {
        $this->set('page_size', $pageSize);
    }

    /**
     * @param int $lastOrderId
     */
    public function setLastOrderId(int $lastOrderId)
    {
        $this->set('last_order_id', $lastOrderId);
    }

    /**
     * @param int $endTime
     */
    public function setEndTime(int $endTime)
    {
        $this->set('end_time', $endTime);
    }

    /**
     * @param int $startTime
     */
    public function setStartTime(int $startTime)
    {
        $this->set('start_time', $startTime);
    }

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "pdd.ddk.order.list.range.get";
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
