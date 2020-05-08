<?php

namespace Tinker\Request\Alibaba;

use Exception;
use Tinker\Request;

class TbkItemInfoGetRequest extends Request
{

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "taobao.tbk.item.info.get";
    }

    /**
     * 商品ID串，用,分割，最大40个
     *
     * @param $itemIds
     * @return $this
     */
    public function setNumiids($itemIds)
    {
        if (is_array($itemIds)) {
            $itemIds = implode(',', $itemIds);
        }
        $this->setApiParameter('num_iids', $itemIds);

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
     * ip地址，影响邮费获取，如果不传或者传入不准确，邮费无法精准提供
     *
     * @param $ip
     * @return $this
     */
    public function setIp($ip)
    {
        $this->setApiParameter('ip', $ip);

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
