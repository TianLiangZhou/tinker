<?php

use Tinker\PDD\PDD;
use Tinker\Request\PDD\PddDdkCouponInfoQuery;
use Tinker\Request\PDD\PddDdkGoodsDetail;
use Tinker\Request\PDD\PddDdkGoodsPromotionUrlGenerate;
use Tinker\Request\PDD\PddDdkGoodsSearch;

include __DIR__ . '/../vendor/autoload.php';


$pdd = new PDD('xx', 'xx');

$request = new PddDdkGoodsPromotionUrlGenerate();


$request->setPid('8648987_64809720');
$request->setGoodsIdList(7643510884);


$request = new PddDdkGoodsDetail();

$request->setGoodsIdList(7643510884);

$request = new PddDdkCouponInfoQuery();

$request->setCouponIds("804137372");


$request = new PddDdkGoodsSearch();

$request->setKeyword("女装");

$response = $pdd->execute($request);

echo $response->isSuccess();

echo $response->errorMessage();
print_r($response->getBody());



