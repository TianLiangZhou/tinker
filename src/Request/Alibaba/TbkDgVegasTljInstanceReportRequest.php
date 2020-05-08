<?php


namespace Tinker\Request\Alibaba;

use Exception;
use Tinker\Request;

class TbkDgVegasTljInstanceReportRequest extends Request
{

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "taobao.tbk.dg.vegas.tlj.instance.report";
    }

    /**
     * 实例ID
     *
     * @param string $rightsId
     * @return $this
     */
    public function setRightsId(string $rightsId)
    {
        $this->setApiParameter('rights_id', $rightsId);

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
