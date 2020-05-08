<?php


namespace Tinker\Request\Alibaba;

use Tinker\Request;

class TbkActivityInfoGetRequest extends Request
{
    public function getApiMethodName(): string
    {
        return "taobao.tbk.activity.info.get";
    }

    /**
     * 	mm_xxx_xxx_xxx的第三位
     *
     * @param $adzoneId
     * @return $this
     */
    public function setAdzoneId($adzoneId)
    {
        $this->setApiParameter('adzone_id', $adzoneId);

        return $this;
    }

    /**
     * mm_xxx_xxx_xxx 仅三方分成场景使用
     *
     * @param $subPid
     * @return $this
     */
    public function setSubPid($subPid)
    {
        $this->setApiParameter('sub_pid', $subPid);

        return $this;
    }

    /**
     * 代理id
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
     * 	官方活动物料id
     *
     * @param $activityMaterialId
     * @return $this
     */
    public function setActivityMaterialId($activityMaterialId)
    {
        $this->setApiParameter('activity_material_id', $activityMaterialId);

        return $this;
    }

    public function check()
    {
        
    }
}
