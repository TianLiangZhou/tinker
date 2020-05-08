<?php


namespace Tinker\Request\JD;


use Exception;
use Tinker\Request;

class JdUnionOpenGoodsPromotiongoodsinfoQuery extends Request
{

    protected $skuIds = [
        'skuIds' => '',
    ];

    /**
     * @param array $idSets
     */
    public function setSkuIds(array $idSets)
    {
        $this->skuIds['skuIds'] = implode(',', $idSets);
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
     *
     */
    public function setParamJson()
    {
        $this->setApiParameter('param_json', json_encode($this->getSkuIds()));
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
