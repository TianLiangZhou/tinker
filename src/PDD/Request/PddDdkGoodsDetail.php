<?php


namespace Tinker\PDD\Request;


use Exception;
use Tinker\Request;

/**
 * Class PddDdkGoodsDetail
 * @package Tinker\PDD\Request
 * @see https://open.pinduoduo.com/#/apidocument/port?id=pdd.ddk.goods.detail
 */
class PddDdkGoodsDetail extends Request
{

    /**
     * @param int $id
     */
    public function setGoodsIdList(int $id)
    {
        $this->set('goods_id_list', "[$id]");
    }

    /**
     * @param string $pid
     */
    public function setPid(string $pid)
    {
        $this->set('pid', $pid);
    }

    /**
     * @param string $custom
     */
    public function setCustomParameters(string $custom)
    {
        $this->set('custom_parameters', $custom);
    }

    /**
     * @param int $id
     */
    public function setZsDuoId(int $id)
    {
        $this->set('zs_duo_id', $id);
    }

    /**
     * @param int $planType
     */
    public function setPlanType(int $planType = 3)
    {
        $this->set('plan_type', $planType);
    }


    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "pdd.ddk.goods.detail";
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
