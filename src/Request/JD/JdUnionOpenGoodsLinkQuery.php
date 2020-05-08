<?php


namespace Tinker\Request\JD;


use Exception;
use Tinker\Request;

class JdUnionOpenGoodsLinkQuery extends Request
{

    /**
     * @var array
     */
    protected $goodsReq = [
        'goodsReq' => [
            'url' => '',
            'subUnionId' => '',
        ]
    ];

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->goodsReq['goodsReq']['url'] = $url;
    }

    /**
     * @param string $subUnionId
     */
    public function setSubUnionId(string $subUnionId)
    {
        $this->goodsReq['goodsReq']['subUnionId'] = $subUnionId;
    }

    /**
     *
     */
    public function setParamJson()
    {
        $this->setApiParameter('param_json', json_encode($this->getGoodsReq()));
    }

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "jd.union.open.goods.link.query ";
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
    public function getGoodsReq(): array
    {
        return $this->goodsReq;
    }
}
