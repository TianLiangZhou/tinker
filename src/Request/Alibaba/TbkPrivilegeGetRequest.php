<?php


namespace Tinker\Request\Alibaba;

use Tinker\Request;

class TbkPrivilegeGetRequest extends Request
{
    public function getApiMethodName(): string
    {
        return "taobao.tbk.privilege.get";
    }

    /**
     * 带券ID与商品ID的加密串
     *
     * @param string $me
     * @return $this
     */
    public function setMe(string $me)
    {
        $this->setApiParameter('me', $me);

        return $this;
    }

    /**
     * 	商品ID
     *
     * @param $itemId
     * @return $this
     */
    public function setItemId($itemId)
    {

        $this->setApiParameter('item_id', $itemId);

        return $this;
    }

    /**
     * 	推广位id，mm_xx_xx_xx pid三段式中的第三段
     *
     * @param string $adzoneId
     * @return $this
     */
    public function setAdzoneId(string $adzoneId)
    {

        $this->setApiParameter('adzone_id', $adzoneId);

        return $this;
    }

    /**
     * 备案的网站id, mm_xx_xx_xx pid三段式中的第二段
     *
     * @param string $siteId
     * @return $this
     */
    public function setSiteId(string $siteId)
    {
        $this->setApiParameter('site_id', $siteId);

        return $this;
    }

    /**
     * 	渠道关系ID，仅适用于渠道推广场景
     *
     * @param string $relationId
     * @return $this
     */
    public function setRelationId(string $relationId)
    {
        $this->setApiParameter('relation_id', $relationId);

        return $this;
    }

    public function check()
    {

    }
}
