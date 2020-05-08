<?php

namespace Tinker\Request\Alibaba;

use Exception;
use Tinker\Request;

class TbkShopConvertRequest extends Request
{

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "taobao.tbk.shop.convert";
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
            $fields = "user_id,click_url";
        }
        $this->setApiParameter('fields', $fields);

        return $this;
    }

    /**
     * 卖家ID串，用','分割，从taobao.tbk.shop.get接口获取user_id字段
     *
     * @param mixed $userIds 卖家ID
     * @return $this
     */
    public function setUserIds($userIds)
    {
        if (is_array($userIds)) {
            $userIds = implode(',', $userIds);
        }
        $this->setApiParameter('user_ids', $userIds);

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
    public function setPlatform(int $platform = 1)
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
     * @return mixed
     * @throws Exception
     */
    public function check()
    {
        // TODO: Implement check() method.
    }
}
