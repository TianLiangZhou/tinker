<?php


namespace Tinker\Request\PDD;


use Exception;
use Tinker\Request;

/**
 * Class PddDdkGoodsPromotionUrlGenerate
 * @package Tinker\PDD\Request
 * @see https://open.pinduoduo.com/#/apidocument/port?id=pdd.ddk.goods.detail
 */
class PddDdkGoodsZsUnitUrlGen extends Request
{

    /**
     * 渠道id
     *
     * @param string $pid
     */
    public function setPid(string $pid)
    {
        $this->set('pid', $pid);
    }

    /**
     * 需转链的链接
     *
     * @param string $url
     */
    public function setSourceUrl(string $url)
    {
        $this->set('source_url', $url);
    }

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "pdd.ddk.goods.zs.unit.url.gen";
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
