<?php


namespace Tinker\PDD\Request;


use Exception;
use function PHPSTORM_META\elementType;
use Tinker\Request;

/**
 * Class PddDdkGoodsSearch
 * @package Tinker\PDD\Request
 * @see https://open.pinduoduo.com/#/apidocument/port?id=pdd.ddk.rp.prom.url.generate
 */
class PddDdkGoodsSearch extends Request
{

    public function setKeyword(string $keyword)
    {
        $this->set('keyword', $keyword);
    }

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
     * @param int $sortType
     */
    public function setSortType(int $sortType)
    {
        $this->set('sort_type', $sortType);
    }

    /**
     * @param bool $isCoupon
     */
    public function setWithCoupon(bool $isCoupon = true)
    {
        $this->set('with_coupon', $isCoupon);
    }

    /**
     * @param array $list
     */
    public function setRangeList(array $list)
    {
        $this->set('range_list', json_encode($list));
    }

    /***
     * @param int $catId
     */
    public function setCatId(int $catId)
    {
        $this->set('cat_id', $catId);
    }

    /**
     * @param array $idSets
     */
    public function setGoodsIdList(array $idSets)
    {
        $this->set('goods_id_list', json_encode($idSets));
    }

    /**
     * @param int $type
     */
    public function setMerchantType(int $type)
    {
        $this->set('merchant_type', $type);
    }

    /**
     * @param string $pid
     */
    public function setPid(string $pid)
    {
        $this->set('pid', $pid);
    }


    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "pdd.ddk.goods.search";
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
