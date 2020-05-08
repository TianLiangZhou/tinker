<?php


namespace Tinker\Request\PDD;


use Exception;
use Tinker\Request;

/**
 * Class PddDdkGoodsPromotionUrlGenerate
 * @package Tinker\PDD\Request
 * @see https://open.pinduoduo.com/#/apidocument/port?id=pdd.ddk.goods.detail
 */
class PddDdkResourceUrlGen extends Request
{

    /**
     * @param string $pid
     */
    public function setPid(string $pid)
    {
        $this->set('pid', $pid);
    }

    /**
     * 频道来源：4-限时秒杀,39997-充值中心, 39998-转链type，39999-电器城，39996-百亿补贴
     *
     * @param int $type
     */
    public function setResourceType(int $type)
    {
        $this->set('resource_type', $type);
    }

    /**
     * 原链接
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->set('url', $url ? 'true' : 'false');
    }

    /**
     *
     * 自定义参数，为链接打上自定义标签；自定义参数最长限制64个字节；
     * 格式为： {"uid":"11111","sid":"22222"} ，其中 uid 用户唯一标识，可自行加密后传入，每个用户仅且对应一个标识，
     * 必填； sid 上下文信息标识，例如sessionId等，非必填。该json字符串中也可以加入其他自定义的key
     *
     * @param string $custom
     */
    public function setCustomParameters(string $custom)
    {
        $this->set('custom_parameters', $custom);
    }

    /**
     * 是否生成qq小程序
     * @param bool $isQQ
     */
    public function setGenerateQQApp(bool $isQQ)
    {
        $this->set('generate_qq_app', $isQQ ? 'true' : 'false');
    }


    /**
     * 是否生成小程序
     *
     * @param bool $isWeApp
     */
    public function setGenerateWeApp(bool $isWeApp)
    {
        $this->set('generate_we_app', $isWeApp ? 'true' : 'false');
    }

    /**
     * 是否返回 schema URL
     *
     * @param bool $isApp
     */
    public function setGenerateSchemeUrl(bool $isApp)
    {
        $this->set('generate_schema_url', $isApp ? 'true' : 'false');
    }


    /**
     * @return string
     */
    public function getApiMethodName(): string
    {
        // TODO: Implement getApiMethodName() method.
        return "pdd.ddk.resource.url.gen";
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
