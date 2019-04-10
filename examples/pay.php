<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2019-03-09
 * Time: 10:57
 */

use Tinker\Pay\Union\Request\BackendTransRequest;
use Tinker\Pay\Union\UnionPay;

include __DIR__ . '/../vendor/autoload.php';

$union = new UnionPay('85xxxxxxxxxxx98');

$union->privateCertPath = __DIR__ . '/certs/unionpay.pfx';
$union->privateCertPwd = '123456';

$request = new BackendTransRequest();

$request->setBizContent([
    'txnType' => '01',				      //交易类型
    'txnSubType' => '07',				  //交易子类
    'bizType' => '000000',				  //业务类型
    'currencyCode' => '156',	          //交易币种，境内商户固定156
    'orderId' => '32019041023253034211',	//商户订单号，8-32位数字字母，不能含“-”或“_”，此处默认取demo演示页面传递的参数，可以自行定制规则
    'txnAmt' => 100,  	//交易金额，单位分，此处默认取demo演示页面传递的参数
    'backUrl' => 'https://example.com/notify',   //后台通知地址
]);
$response = $union->execute($request);

