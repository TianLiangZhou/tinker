<?php


namespace Tinker\Request\Alibaba;


class TbkScOrderGetRequest extends TbkOrderGetRequest
{
    public function getApiMethodName(): string
    {
        return "taobao.tbk.sc.order.get";
    }
}
