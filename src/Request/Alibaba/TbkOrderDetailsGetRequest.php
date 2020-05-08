<?php


namespace Tinker\Request\Alibaba;

use Tinker\Request;

class TbkOrderDetailsGetRequest extends Request
{
    public function getApiMethodName(): string
    {
        return "taobao.tbk.order.details.get";
    }

    /**
     * 查询时间类型，1：按照订单淘客创建时间查询，2:按照订单淘客付款时间查询，3:按照订单淘客结算时间查询
     *
     * @param $queryType
     * @return $this
     */
    public function setQueryType($queryType)
    {

        $this->setApiParameter('query_type', $queryType);

        return $this;
    }

    /**
     * 位点，除第一页之外，都需要传递；前端原样返回。
     *
     * @param $positionIndex
     * @return $this
     */
    public function setPositionIndex($positionIndex)
    {

        $this->setApiParameter('position_index', $positionIndex);

        return $this;
    }

    /**
     * 	页大小，默认20，1~100
     *
     * @param int $pageSize
     * @return $this
     */
    public function setPageSize(int $pageSize)
    {
        $this->setApiParameter('page_size', $pageSize);

        return $this;
    }

    /**
     * 	推广者角色类型,2:二方，3:三方，不传，表示所有角色
     *
     * @param $memberType
     * @return $this
     */
    public function setMemberType(int $memberType)
    {
        $this->setApiParameter('member_type', $memberType);

        return $this;
    }

    /**
     * 淘客订单状态，12-付款，13-关闭，14-确认收货，3-结算成功;不传，表示所有状态
     *
     * @param int $tkStatus
     * @return $this
     */
    public function setTkStatus(int $tkStatus)
    {
        $this->setApiParameter('tk_status', $tkStatus);

        return $this;
    }

    /**
     * 订单查询结束时间，订单开始时间至订单结束时间，中间时间段日常要求不超过3个小时，但如618、双11、年货节等大促期间预估时间段不可超过20分钟，超过会提示错误，调用时请务必注意时间段的选择，以保证亲能正常调用！
     *
     * @param string $endTime
     * @return $this
     */
    public function setEndTime(string $endTime)
    {
        $this->setApiParameter('end_time', $endTime);

        return $this;
    }

    /**
     * 	订单查询开始时间
     *
     * @param string $startTime
     * @return $this
     */
    public function setStartTime(string $startTime)
    {
        $this->setApiParameter('start_time', $startTime);

        return $this;
    }

    /**
     * 跳转类型，当向前或者向后翻页必须提供,-1: 向前翻页,1：向后翻页
     *
     * @param $jumpType
     * @return $this
     */
    public function setJumpType($jumpType)
    {
        $this->setApiParameter('jump_type', $jumpType);

        return $this;
    }

    /**
     * 	第几页，默认1，1~100
     *
     * @param int $pageNo
     * @return $this
     */
    public function setPageNo(int $pageNo)
    {
        $this->setApiParameter('page_no', $pageNo);

        return $this;
    }

    /**
     * 场景订单场景类型，1:常规订单，2:渠道订单，3:会员运营订单，默认为1
     *
     * @param int $orderScene
     * @return $this
     */
    public function setOrderScene(int $orderScene)
    {
        $this->setApiParameter('order_scene', $orderScene);

        return $this;
    }

    public function check()
    {

    }
}
