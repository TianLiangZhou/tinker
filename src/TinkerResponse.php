<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2018-12-24
 * Time: 09:32
 */

namespace Tinker;

use SimpleXMLElement;
use stdClass;

/**
 * Class TinkerResponse
 * @package Tinker
 */
abstract class TinkerResponse implements ResponseInterface
{
    /**
     * @var null|stdClass|SimpleXMLElement
     */
    protected $body = null;

    protected $format = 'json';

    /**
     * @var string
     */
    protected $method = null;

    /**
     * @var array
     */
    protected $methodBodyReplace = [];

    /**
     * TinkerResponse constructor.
     * @param $body
     * @param string $method
     * @param string $format
     */
    public function __construct($body, string $method, string $format = 'json')
    {
        $this->body = $body;

        $this->method = $method;

        $this->format = $format;
    }

    /**
     *
     * 返回的结果实体
     *
     * @param bool $isRaw
     * @return SimpleXMLElement|stdClass
     */
    public function getBody($isRaw = false)
    {
        if ($isRaw) {
            return $this->body;
        }
        // TODO: Implement getBody() method.
        switch ($this->format) {
            case 'xml':
                return $this->getXmlBody();
            default:
                return $this->getJsonBody();
        }
    }

    /**
     * @return stdClass|null
     */
    public function getJsonBody(): ?stdClass
    {
        return $this->body;
    }

    /**
     * @return SimpleXMLElement
     */
    public function getXmlBody(): ?SimpleXMLElement
    {
        return $this->body;
    }

    /**
     * @return mixed
     */
    protected function getMethodBody()
    {
        $search = array_keys($this->methodBodyReplace);
        $value = array_values($this->methodBodyReplace);

        $property = str_replace($search, $value, $this->method) . '_response';

        if (property_exists($this->body, $property)) {
            return $this->body->$property;
        }
        return null;
    }

    /**
     * @param $search
     * @param $value
     * @return $this
     */
    public function addMethodBodyReplace($search, $value)
    {
        $this->methodBodyReplace[$search] = $value;
        return $this;
    }
}
