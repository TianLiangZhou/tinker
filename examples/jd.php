<?php


include __DIR__ . '/../vendor/autoload.php';


$jd = new \Tinker\JD\JD('xx', 'xx');

$request = new \Tinker\JD\Request\JdUnionOpenPromotionCommonGet();

$request->setMaterialId("https://item.jd.com/40613506294.html");
$request->setSiteId("1793982915");
$request->set('param_json', json_encode($request->getPromotionCodeReq()));


$request = new \Tinker\JD\Request\JdUnionOpenGoodsPromotiongoodsinfoQuery();

$request->setSkuIds('46528309767');


$request->set('param_json', json_encode($request->getSkuIds()));

$request = new \Tinker\JD\Request\JdUnionOpenCategoryGoodsGet();

$request->set('param_json', json_encode($request->getReq()));

/**
$request = new \Tinker\JD\Request\JdUnionOpenOrderQuery();

$request->setTime("201811031212");

$request->set('param_json', json_encode($request->getOrderReq()));
 */

/**
$request = new \Tinker\JD\Request\JdUnionOpenGoodsQuery();

$request->setKeyword("akka");

$request->set('param_json', json_encode($request->getGoodsReqDTO()));
 */

$response = $jd->execute($request);

echo $response->isSuccess();
print_r($response->getBody()->result->data);


