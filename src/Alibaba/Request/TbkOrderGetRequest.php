<?php


namespace Tinker\Alibaba\Request;


use Exception;
use Tinker\Request;

class TbkOrderGetRequest extends Request
{

    const DEFAULT_FIELDS = 'tb_trade_parent_id,tb_trade_id,num_iid,item_title,item_num,price,pay_price,seller_nick,'
    . 'seller_shop_title,commission,commission_rate,unid,create_time,earning_time,tk3rd_pub_id,tk3rd_site_id,'
    . 'tk3rd_adzone_id,relation_id,tb_trade_parent_id,tb_trade_id,num_iid,item_title,item_num,price,pay_price,'
    . 'seller_nick,seller_shop_title,commission,commission_rate,unid,create_time,earning_time,tk3rd_pub_id,'
    . 'tk3rd_site_id,tk3rd_adzone_id,special_id,click_time';

    public function __construct(array $parameters = array())
    {
        parent::__construct($parameters);

        $this->setFields(self::DEFAULT_FIELDS);
    }

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "taobao.tbk.order.get";
    }

    /**
     * 需返回的字段列表
     *
     * @param $fields
     * @return $this
     */
    public function setFields($fields)
    {
        $this->setApiParameter('fields', $fields);

        return $this;
    }

    /**
     * 订单查询开始时间
     *
     * @param string $datetime
     * @return $this
     */
    public function setStartTime(string $datetime)
    {
        $this->setApiParameter('start_time', $datetime);

        return $this;
    }

    /**
     * 订单查询时间范围，单位：秒，最小60，最大1200，默认60，
     * 仅当查询常规订单，及三方订单时需要设置此参数，
     * 渠道，及会员订单不需要设置此参数，直接通过设置page_size,page_no 翻页查询数据即可
     *
     *
     * @param int $span
     * @return $this
     */
    public function setSpan(int $span)
    {
        $this->setApiParameter('span', $span);

        return $this;
    }

    /**
     * 第几页，
     *
     * @param int $page
     * @return $this
     */
    public function setPageNo(int $page)
    {
        $this->setApiParameter('page_no', $page);

        return $this;
    }

    /**
     * 页大小
     *
     * @param int $size
     * @return $this
     */
    public function setPageSize(int $size)
    {
        $this->setApiParameter('page_size', $size);

        return $this;
    }

    /**
     * 订单状态，1: 全部订单，3：订单结算，12：订单付款， 13：订单失效，14：订单成功； 订单查询类型为‘结算时间’时，只能查订单结算状态
     *
     * @param int $status
     * @return $this
     */
    public function setTkStatus(int $status)
    {
        $this->setApiParameter('tk_status', $status);

        return $this;
    }

    /**
     * 订单查询类型，创建时间“create_time”，或结算时间“settle_time”
     *
     * @param $queryType
     * @return $this
     */
    public function setOrderQueryType($queryType)
    {
        $this->setApiParameter('order_query_type', $queryType);

        return $this;
    }

    /**
     * 订单场景类型，1:常规订单，2:渠道订单，3:会员运营订单，默认为1，
     * 通过设置订单场景类型，媒体可以查询指定场景下的订单信息，
     *
     * 例如不设置，或者设置为1，表示查询常规订单，常规订单包含淘宝客所有的订单数据，含渠道，及会员运营订单，但不包含3方分成，及维权订单
     *
     * @param int $scene
     * @return $this
     */
    public function setOrderScene(int $scene)
    {
        $this->setApiParameter('order_scene', $scene);

        return $this;

    }

    /**
     * 订单数据统计类型，1: 2方订单，2: 3方订单，如果不设置，或者设置为1，表示2方订单
     *
     * @param int $countType
     * @return $this
     */
    public function setOrderCountType(int $countType)
    {
        $this->setApiParameter('order_count_type', $countType);

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
