<?php
/**
 * Created by PhpStorm.
 * User: meshell
 * Date: 2019-03-30
 * Time: 21:31
 */
namespace Tinker\Support;

use SimpleXmlElement as LibSimpleXmlElement;

class SimpleXmlElement extends LibSimpleXmlElement
{
    public function addCData($data)
    {
        $node = dom_import_simplexml($this);
        $no   = $node->ownerDocument;
        $node->appendChild($no->createCDATASection($data));
    }
}
