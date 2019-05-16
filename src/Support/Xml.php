<?php

/*
 * This file is part of the overtrue/wechat.
 *
 * (c) overtrue <i@overtrue.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Tinker\Support;

use SimpleXMLElement;

/**
 * Class Xml.
 */
class Xml
{
    /**
     * Xml to array.
     *
     * @param string $xml Xml string
     *
     * @return array
     */
    public static function parse(string $xml)
    {
        return self::normalize(self::simple($xml));
    }

    /**
     * Array to Xml
     *
     * @param array $data
     *
     * @param string $rootName
     *
     * @param bool $isCdata
     *
     * @return mixed
     */
    public static function import(array $data, $rootName = 'root', bool $isCdata = false)
    {
        $xml = new class("<$rootName/>") extends SimpleXMLElement {
            /**
             * @param $data
             */
            public function addCData($data)
            {
                $node = dom_import_simplexml($this);
                $no   = $node->ownerDocument;
                $node->appendChild($no->createCDATASection($data));
            }
        };
        array_walk_recursive($data, function ($value, $name) use ($xml, $isCdata) {
            if (is_numeric($value) || $isCdata == false) {
                $xml->addChild($name, $value);
            } else {
                $xml->$name = null;
                $xml->$name->addCData($value);
            }
        });
        return $xml->asXML();
    }

    /**
     * Xml to SimpleXMLElement
     *
     * @param string $inputXml
     *
     * @return SimpleXMLElement
     */
    public static function simple(string $inputXml): ?SimpleXMLElement
    {
        $backup = libxml_disable_entity_loader(true);
        $backup_errors = libxml_use_internal_errors(true);
        $xml = simplexml_load_string(self::sanitize($inputXml),
                'SimpleXMLElement',
                LIBXML_COMPACT | LIBXML_NOCDATA | LIBXML_NOBLANKS);
        libxml_disable_entity_loader($backup);
        libxml_clear_errors();
        libxml_use_internal_errors($backup_errors);
        if ($xml === false) {
            return null;
        }
        return $xml;
    }

    /**
     * Xml encode.
     *
     * @param mixed  $data
     * @param string $root
     * @param string $item
     * @param string $attr
     * @param string $id
     *
     * @return string
     */
    public static function build(
        $data,
        $root = 'xml',
        $item = 'item',
        $attr = '',
        $id = 'id'
    ) {
        if (is_array($attr)) {
            $_attr = [];

            foreach ($attr as $key => $value) {
                $_attr[] = "{$key}=\"{$value}\"";
            }

            $attr = implode(' ', $_attr);
        }

        $attr = trim($attr);
        $attr = empty($attr) ? '' : " {$attr}";
        $xml = "<{$root}{$attr}>";
        $xml .= self::data2Xml($data, $item, $id);
        $xml .= "</{$root}>";

        return $xml;
    }

    /**
     * Build CDATA.
     *
     * @param string $string
     *
     * @return string
     */
    public static function cdata($string)
    {
        return sprintf('<![CDATA[%s]]>', $string);
    }

    /**
     * Object to array.
     *
     *
     * @param \SimpleXMLElement $obj
     *
     * @return array
     */
    protected static function normalize($obj)
    {
        $result = null;

        if (is_object($obj)) {
            $obj = (array) $obj;
        }

        if (is_array($obj)) {
            foreach ($obj as $key => $value) {
                $res = self::normalize($value);
                if (('@attributes' === $key) && ($key)) {
                    $result = $res; // @codeCoverageIgnore
                } else {
                    $result[$key] = $res;
                }
            }
        } else {
            $result = $obj;
        }

        return $result;
    }

    /**
     * Array to Xml.
     *
     * @param array  $data
     * @param string $item
     * @param string $id
     *
     * @return string
     */
    protected static function data2Xml($data, $item = 'item', $id = 'id')
    {
        $xml = $attr = '';

        foreach ($data as $key => $val) {
            if (is_numeric($key)) {
                $id && $attr = " {$id}=\"{$key}\"";
                $key = $item;
            }

            $xml .= "<{$key}{$attr}>";

            if ((is_array($val) || is_object($val))) {
                $xml .= self::data2Xml((array) $val, $item, $id);
            } else {
                $xml .= is_numeric($val) ? $val : self::cdata($val);
            }

            $xml .= "</{$key}>";
        }

        return $xml;
    }

    /**
     * Delete invalid characters in Xml.
     *
     * @see https://www.w3.org/TR/2008/REC-xml-20081126/#charsets - Xml charset range
     * @see http://php.net/manual/en/regexp.reference.escape.php - escape in UTF-8 mode
     *
     * @param string $xml
     *
     * @return string
     */
    public static function sanitize($xml)
    {
        return preg_replace('/[^\x{9}\x{A}\x{D}\x{20}-\x{D7FF}\x{E000}-\x{FFFD}\x{10000}-\x{10FFFF}]+/u', '', $xml);
    }
}
