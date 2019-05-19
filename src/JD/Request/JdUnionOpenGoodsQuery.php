<?php


namespace Tinker\JD\Request;


use Exception;
use Tinker\Request;

/**
 * Class JdUnionOpenGoodsQuery
 * @package Tinker\JD\Request
 */
class JdUnionOpenGoodsQuery extends Request
{

    /**
     * @var array
     */
    protected $goodsReqDTO = [
        'goodsReqDTO' => [
            'cid1' => 0,
            'cid2' => 0,
            'cid3' => 0,
            'pageIndex' => 1,
            'pageSize' => 20,
            'skuIds' => [],
            'keyword' => '',
            'pricefrom' => 0,
            'priceto' => 0,
            'commissionShareStart' => 0,
            'commissionShareEnd' => 0,
            'owner' => 'g',
            'sortName' => 'price',
            'sort' => 'desc',
            'isCoupon' => 1,
            'isPG' => 0,
            'pingouPriceStart' => 0,
            'pingouPriceEnd' => 0,
            'isHot' => 0,
            'brandCode' => '',
            'shopId' => 0,
        ],
    ];

    /**
     * @param int $cid1
     */
    public function setCid1(int $cid1)
    {
        $this->goodsReqDTO['goodsReqDTO']['cid1'] = $cid1;
    }


    /**
     * @param int $cid2
     */
    public function setCid2(int $cid2)
    {
        $this->goodsReqDTO['goodsReqDTO']['cid2'] = $cid2;
    }


    /**
     * @param int $index
     */
    public function setPageIndex(int $index)
    {
        $this->goodsReqDTO['goodsReqDTO']['pageIndex'] = $index;
    }

    /**
     * @param int $size
     */
    public function setPageSize(int $size)
    {
        $this->goodsReqDTO['goodsReqDTO']['pageSize'] = $size;
    }

    /**
     * @param array $skuIds
     */
    public function setSkuIds(array $skuIds)
    {
        $this->goodsReqDTO['goodsReqDTO']['skuIds'] = implode(',', $skuIds);
    }

    /**
     * @param string $keyword
     */
    public function setKeyword(string $keyword)
    {
        $this->goodsReqDTO['goodsReqDTO']['keyword'] = $keyword;
    }

    /**
     * @param $pricefrom
     */
    public function setPricefrom($pricefrom)
    {
        $this->goodsReqDTO['goodsReqDTO']['pricefrom'] = $pricefrom;
    }

    /**
     * @param $priceto
     */
    public function setPriceto($priceto)
    {
        $this->goodsReqDTO['goodsReqDTO']['priceto'] = $priceto;
    }

    /**
     * @param int $commissionShareStart
     */
    public function setCommissionShareStart(int $commissionShareStart)
    {
        $this->goodsReqDTO['goodsReqDTO']['commissionShareStart'] = $commissionShareStart;
    }

    /**
     * @param int $commissionShareEnd
     */
    public function setCommissionShareEnd(int $commissionShareEnd)
    {
        $this->goodsReqDTO['goodsReqDTO']['commissionShareEnd'] = $commissionShareEnd;
    }

    /**
     * @param string $owner
     */
    public function setOwner(string $owner)
    {
        $this->goodsReqDTO['goodsReqDTO']['owner'] = $owner;
    }

    /**
     * @param string $sortName
     */
    public function setSortName(string $sortName)
    {
        $this->goodsReqDTO['goodsReqDTO']['sortName'] = $sortName;
    }

    /**
     * @param string $sort
     */
    public function setSort(string $sort)
    {
        $this->goodsReqDTO['goodsReqDTO']['sort'] = $sort;
    }

    /**
     * @param int $isCoupon
     */
    public function setIsCoupon(int $isCoupon)
    {
        $this->goodsReqDTO['goodsReqDTO']['isCoupon'] = $isCoupon;
    }

    /**
     * @param int $isPG
     */
    public function setIsPG(int $isPG)
    {

        $this->goodsReqDTO['goodsReqDTO']['isPG'] = $isPG;
    }

    /**
     * @param $pingouPriceStart
     */
    public function setPingouPriceStart($pingouPriceStart)
    {
        $this->goodsReqDTO['goodsReqDTO']['pingouPriceStart'] = $pingouPriceStart;
    }

    /**
     * @param $pingouPriceEnd
     */
    public function setPingouPriceEnd($pingouPriceEnd)
    {
        $this->goodsReqDTO['goodsReqDTO']['pingouPriceEnd'] = $pingouPriceEnd;
    }

    /**
     * @param int $isHot
     */
    public function setIsHot(int $isHot)
    {
        $this->goodsReqDTO['goodsReqDTO']['isHot'] = $isHot;
    }

    /**
     * @param $brandCode
     */
    public function setBrandCode($brandCode)
    {
        $this->goodsReqDTO['goodsReqDTO']['brandCode'] = $brandCode;
    }

    /**
     * @param int $shopId
     */
    public function setShopId(int $shopId)
    {
        $this->goodsReqDTO['goodsReqDTO']['shopId'] = $shopId;
    }
    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "jd.union.open.goods.query";
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
    public function getGoodsReqDTO(): array
    {
        return $this->goodsReqDTO;
    }
}
