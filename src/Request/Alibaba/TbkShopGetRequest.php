<?php

namespace Tinker\Request\Alibaba;

use Exception;
use Tinker\Request;

class TbkShopGetRequest extends Request
{

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "taobao.tbk.shop.get";
    }

    /**
     * 需返回的字段列表
     *
     * @param $fields
     * @return $this
     */
    public function setFields($fields)
    {
        if (is_array($fields)) {
            $fields = implode(',', $fields);
        }
        if (empty($fields)) {
            $fields = "user_id,shop_title,shop_type,seller_nick,pict_url,shop_url";
        }
        $this->setApiParameter('fields', $fields);

        return $this;
    }

    /**
     * 查询词
     *
     * @param mixed $q 查询词
     * @return $this
     */
    public function setQ(string $q)
    {
        $this->setApiParameter('q', $q);
        return $this;
    }

    /**
     * 排序_des（降序），排序_asc（升序），佣金比率（commission_rate）， 商品数量（auction_count），销售总数量（total_auction）
     *
     * @param int $sort
     * @return $this
     */
    public function setSort(string $sort)
    {
        $this->setApiParameter('sort', $sort);

        return $this;
    }

    /**
     * 第几页，默认1，1~100
     *
     * @param int $page
     * @return $this
     */
    public function setPageNo(int $page = 1)
    {
        $this->setApiParameter('page_no', $page);

        return $this;
    }

    /**
     * 页大小，默认20，1~100
     *
     * @param int $size
     * @return $this
     */
    public function setPagesize(int $size = 20)
    {
        $this->setApiParameter('page_size', $size);

        return $this;
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
