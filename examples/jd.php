<?php


use Tinker\JD\JD;
use Tinker\Request\JD\JdUnionOpenCategoryGoodsGet;
use Tinker\Request\JD\JdUnionOpenGoodsPromotiongoodsinfoQuery;
use Tinker\Request\JD\JdUnionOpenPromotionCommonGet;

include __DIR__ . '/../vendor/autoload.php';


$jd = new JD('xx', 'xx');

$request = new JdUnionOpenPromotionCommonGet();

$request->setMaterialId("https://item.jd.com/40613506294.html");
$request->setSiteId("1793982915");
$request->set('param_json', json_encode($request->getPromotionCodeReq()));


$request = new JdUnionOpenGoodsPromotiongoodsinfoQuery();

$request->setSkuIds('46528309767');


$request->set('param_json', json_encode($request->getSkuIds()));

$request = new JdUnionOpenCategoryGoodsGet();

$request->set('param_json', json_encode($request->getReq()));

/**
$request = new \Tinker\Request\JD\JdUnionOpenOrderQuery();

$request->setTime("201811031212");

$request->set('param_json', json_encode($request->getOrderReq()));
 */

/**
$request = new \Tinker\Request\JD\JdUnionOpenGoodsQuery();

$request->setKeyword("akka");

$request->set('param_json', json_encode($request->getGoodsReqDTO()));
 */

$response = $jd->execute($request);

echo $response->isSuccess();
print_r($response->getBody()->result->data);


