<?php


namespace Tinker\Alibaba\Request;


class TbkScOrderGetRequest extends TbkOrderGetRequest
{
    public function getApiMethodName(): string
    {
        return "taobao.tbk.sc.order.get";
    }
}
