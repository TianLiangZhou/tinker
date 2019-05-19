<?php


namespace Tinker\JD\Request;


use Exception;
use Tinker\Request;

class JdUnionOpenCategoryGoodsGet extends Request
{

    protected $req = [
        'req' => [
            'parentId' => 0,
            'grade' => 0,
        ]
    ];

    /**
     * @param int $grade
     */
    public function setGrade(int $grade)
    {
        $this->req['req']['grade'] = $grade;
    }

    /**
     * @param int $parentId
     */
    public function setParentId(int $parentId)
    {
        $this->req['req']['parentId'] = $parentId;
    }


    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "jd.union.open.category.goods.get";
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function check()
    {
        // TODO: Implement check() method.
    }

    /**
     * @return array
     */
    public function getReq(): array
    {
        return $this->req;
    }
}
