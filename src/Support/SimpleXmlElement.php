<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2019-03-30
 * Time: 21:31
 */
namespace Tinker\Support;

use SimpleXmlElement as LibSimpleXmlElement;

/**
 * Class SimpleXmlElement
 * @package Tinker\Support
 */
class SimpleXmlElement extends LibSimpleXmlElement
{
    /**
     * @param $data
     */
    public function addCData($data)
    {
        $node = dom_import_simplexml($this);
        $no   = $node->ownerDocument;
        $node->appendChild($no->createCDATASection($data));
    }
}
