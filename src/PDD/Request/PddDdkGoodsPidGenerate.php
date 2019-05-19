<?php


namespace Tinker\PDD\Request;


use Exception;
use Tinker\Request;

/**
 * Class PddDdkGoodsPidGenerate
 * @package Tinker\PDD\Request
 * @see https://open.pinduoduo.com/#/apidocument/port?id=pdd.ddk.rp.prom.url.generate
 */
class PddDdkGoodsPidGenerate extends Request
{

    /**
     * @param int $number
     */
    public function setNumber(int $number)
    {
        $this->set('number', $number);
    }

    /**
     * @param array $name
     */
    public function setPidNameList(array $name)
    {
        $this->set('p_id_name_list', '[' . implode(',', $name) . ']');
    }

    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "pdd.ddk.goods.pid.generate";
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
