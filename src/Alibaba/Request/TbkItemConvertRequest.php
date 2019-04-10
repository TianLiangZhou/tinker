<?php


namespace Tinker\Alibaba\Request;


use Exception;
use Tinker\Request;

class TbkItemConvertRequest extends Request
{

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "taobao.tbk.item.convert";
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
        $this->setApiParameter('fields', $fields);

        return $this;
    }

    /**
     * 商品ID串，用','分割，从taobao.tbk.item.get接口获取num_iid字段，最大40个
     *
     * @param $numIids
     * @return $this
     */
    public function setNumIids($numIids)
    {
        if (is_array($numIids)) {
            $numIids = implode(',', $numIids);
        }
        $this->setApiParameter('num_iids', $numIids);

        return $this;
    }

    /**
     * 广告位ID，区分效果位置
     *
     * @param int $adzoneId
     * @return $this
     */
    public function setAdzoneId(int $adzoneId)
    {
        $this->setApiParameter('adzone_id', $adzoneId);

        return $this;
    }

    /**
     * 链接形式：1：PC，2：无线，默认：１
     *
     * @param int $platform
     * @return $this
     */
    public function setPlatform(int $platform)
    {
        $this->setApiParameter('platform', $platform);

        return $this;
    }

    /**
     * 自定义输入串，英文和数字组成，长度不能大于12个字符，区分不同的推广渠道
     *
     * @param $unid
     * @return $this
     */
    public function setUnid($unid)
    {
        $this->setApiParameter('unid', $unid);

        return $this;
    }

    /**
     * 1表示商品转通用计划链接，其他值或不传表示转营销计划链接
     *
     * @param $dx
     * @return $this
     */
    public function setDx($dx)
    {
        $this->setApiParameter('dx', $dx);

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
