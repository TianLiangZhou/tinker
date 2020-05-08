<?php


namespace Tinker\Request\Alibaba;


use Exception;
use Tinker\Request;

class TbkRelationRefundRequest extends Request
{

    /**
     * @var array
     */
    private $searchOption = [
        'page_size' => "100",
        'search_type' => "3",
        'refund_type' => "2",
        'start_time'  => "",
        'page_no' => "1",
        'biz_type' => "1",
    ];

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "taobao.tbk.relation.refund";
    }

    /**
     * @param int $size
     * @return $this
     */
    public function setPageSize(int $size)
    {
        $this->searchOption['page_size'] = $size;

        return $this;
    }

    /**
     * @param int $type
     * @return $this
     */
    public function setSearchType(int $type)
    {
        $this->searchOption['search_type'] = $type;

        return $this;
    }

    /**
     * @param int $refundType
     * @return $this
     */
    public function setRefundType(int $refundType)
    {
        $this->searchOption['refund_type'] = $refundType;

        return $this;
    }

    /**
     * @param string $datetime
     * @return $this
     */
    public function setStartTime(string $datetime)
    {
        $this->searchOption['start_time'] = $datetime;

        return $this;
    }

    /**
     * @param int $page
     * @return $this
     */
    public function setPageNo(int $page)
    {
        $this->searchOption['page_no'] = $page;

        return $this;
    }

    /**
     * @param int $bizType
     * @return $this
     */
    public function setBizType(int $bizType)
    {
        $this->searchOption['biz_type'] = $bizType;

        return $this;
    }
    /**
     * @return $this
     */
    public function setSearchOption()
    {
        $this->setApiParameter('search_options', json_encode($this->searchOption));

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
