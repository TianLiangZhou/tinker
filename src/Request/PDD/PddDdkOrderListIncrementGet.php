<?php


namespace Tinker\Request\PDD;


use Exception;
use Tinker\Request;

/**
 * Class PddDdkOrderDetailGet
 * @package Tinker\PDD\Request
 *
 * @see https://open.pinduoduo.com/#/apidocument/port?portId=pdd.ddk.order.list.increment.get
 */
class PddDdkOrderListIncrementGet extends Request
{

    /**
     * @param bool $returnCount
     */
    public function setReturnCount(bool $returnCount)
    {
        $this->set('return_count', $returnCount ? 'true' : 'false');
    }

    /**
     * @param int $pageSize
     */
    public function setPageSize(int $pageSize)
    {
        $this->set('page_size', $pageSize);
    }

    /**
     * @param int $page
     */
    public function setPage(int $page)
    {
        $this->set('page', $page);
    }

    /**
     * @param int $endUpdateTime
     */
    public function setEndUpdateTime(int $endUpdateTime)
    {
        $this->set('end_update_time', $endUpdateTime);
    }

    /**
     * @param int $startUpdateTime
     */
    public function setStartUpdateTime(int $startUpdateTime)
    {
        $this->set('start_update_time', $startUpdateTime);
    }
    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "pdd.ddk.order.list.increment.get";
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
