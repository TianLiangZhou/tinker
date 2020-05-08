<?php


namespace Tinker\Request\Alibaba;


use Exception;
use Tinker\Request;

class TbkScPublisherInfoGetRequest extends Request
{

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "taobao.tbk.sc.publisher.info.get";
    }

    public function setInfoType($infoType)
    {
        $this->setApiParameter('info_type', $infoType);
    }

    public function setRelationId($relationId)
    {
        $this->setApiParameter('relation_id', $relationId);
    }

    public function setPageNo(int $pageNo)
    {
        $this->setApiParameter('page_no', $pageNo);
    }

    public function setPageSize(int $pageSize)
    {
        $this->setApiParameter('page_size', $pageSize);
    }

    public function setRelationApp($relationApp)
    {
        $this->setApiParameter('relation_app', $relationApp);
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
