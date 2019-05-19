<?php


namespace Tinker\PDD\Request;


use Exception;
use Tinker\Request;

/**
 * Class PddDdkGoodsPidQuery
 * @package Tinker\PDD\Request
 * @see https://open.pinduoduo.com/#/apidocument/port?id=pdd.ddk.rp.prom.url.generate
 */
class PddDdkGoodsPidQuery extends Request
{

    /**
     * @param int $page
     */
    public function setPage(int $page)
    {
        $this->set('page', $page);
    }

    /**
     * @param int $size
     */
    public function setPageSize(int $size)
    {
        $this->set('page_size', $size);
    }

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "pdd.ddk.goods.pid.query";
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
