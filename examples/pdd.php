<?php

include __DIR__ . '/../vendor/autoload.php';


$pdd = new \Tinker\PDD\PDD('xx', 'xx');

$request = new \Tinker\PDD\Request\PddDdkGoodsPromotionUrlGenerate();


$request->setPid('8648987_64809720');
$request->setGoodsIdList(7643510884);


$request = new \Tinker\PDD\Request\PddDdkGoodsDetail();

$request->setGoodsIdList(7643510884);

$request = new \Tinker\PDD\Request\PddDdkCouponInfoQuery();

$request->setCouponIds("804137372");


$request = new \Tinker\PDD\Request\PddDdkGoodsSearch();

$request->setKeyword("女装");

$response = $pdd->execute($request);

echo $response->isSuccess();

echo $response->errorMessage();
print_r($response->getBody());



