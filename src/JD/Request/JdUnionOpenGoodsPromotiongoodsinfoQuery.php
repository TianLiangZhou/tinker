<?php


namespace Tinker\JD\Request;


use Exception;
use Tinker\Request;

class JdUnionOpenGoodsPromotiongoodsinfoQuery extends Request
{

    protected $skuIds = [
        'skuIds' => '',
    ];

    /**
     * @param string $ids
     */
    public function setSkuIds(string $ids)
    {
        $this->skuIds['skuIds'] =  $ids;
    }



    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "jd.union.open.goods.promotiongoodsinfo.query";
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
    public function getSkuIds()
    {
        return $this->skuIds;
    }
}
