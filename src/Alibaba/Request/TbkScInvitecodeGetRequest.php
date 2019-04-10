<?php


namespace Tinker\Alibaba\Request;


use Exception;
use Tinker\Request;

class TbkScInvitecodeGetRequest extends Request
{

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "taobao.tbk.sc.invitecode.get";
    }

    /**
     * 渠道关系ID
     *
     * @param $relationId
     * @return $this
     */
    public function setRelationId($relationId)
    {
        $this->setApiParameter('relation_id', $relationId);

        return $this;
    }

    /**
     * 渠道推广的物料类型
     *
     * @param string $relationApp
     * @return $this
     */
    public function setRelationApp(string $relationApp)
    {
        $this->setApiParameter('relation_app', $relationApp);

        return $this;

    }

    /**
     * 邀请码类型
     *
     * @param int $codeType
     * @return $this
     */
    public function setCodeType(int $codeType)
    {
        $this->setApiParameter('code_type', $codeType);

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
