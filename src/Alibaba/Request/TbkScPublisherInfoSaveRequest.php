<?php


namespace Tinker\Alibaba\Request;


use Exception;
use Tinker\Request;

class TbkScPublisherInfoSaveRequest extends Request
{

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "taobao.tbk.sc.publisher.info.save";
    }

    /**
     * 来源，取链接的来源
     *
     * @param $relationForm
     * @return $this
     */
    public function setRelationFrom($relationForm)
    {
        $this->setApiParameter('relation_from', $relationForm);

        return $this;
    }

    /**
     * 线下场景信息
     *
     * @param $offlineScene
     * @return $this
     */
    public function setOfflineScene($offlineScene)
    {
        $this->setApiParameter('offline_scene', $offlineScene);

        return $this;
    }

    /**
     * 线上场景信息
     *
     * @param $onlineScene
     * @return $this
     */
    public function setOnlineScene($onlineScene)
    {
        $this->setApiParameter('online_scene', $onlineScene);

        return $this;
    }

    /**
     * 淘宝客邀请渠道的邀请码
     *
     * @param $inviteCode
     * @return $this
     */
    public function setInviterCode($inviteCode)
    {
        $this->setApiParameter('inviter_code', $inviteCode);

        return $this;
    }

    /**
     * 类型
     *
     * @param $infoType
     * @return $this
     */
    public function setInfoType($infoType)
    {
        $this->setApiParameter('info_type', $infoType);

        return $this;
    }

    /**
     * 媒体侧渠道备注
     *
     * @param $note
     * @return $this
     */
    public function setNote($note)
    {
        $this->setApiParameter('note', $note);

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
