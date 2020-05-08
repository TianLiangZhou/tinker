<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018-12-23
 * Time: 23:22
 */

namespace Tinker\Request\Pay\Alipay;


use Exception;
use Tinker\Pay\Alipay\AlipayRequest;

class AlipayFundTransToaccountTransferRequest extends AlipayRequest
{

    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return 'alipay.fund.trans.toaccount.transfer';
    }

    /**
     * @throws Exception
     * @return mixed
     */
    public function check()
    {
        // TODO: Implement check() method.
    }
}
