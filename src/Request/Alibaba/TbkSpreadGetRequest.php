<?php


namespace Tinker\Request\Alibaba;

use Tinker\Request;

class TbkSpreadGetRequest extends Request
{
    public function getApiMethodName(): string
    {
        return "taobao.tbk.spread.get";
    }

    /**
     *    请求列表，内部包含多个url
     *
     * @param $requestUrls
     * @return $this
     */
    public function setRequests(array $requestUrls)
    {
        $this->setApiParameter('requests', json_encode($requestUrls));

        return $this;
    }

    public function check()
    {
        
    }
}
