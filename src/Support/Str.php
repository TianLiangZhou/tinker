<?php


namespace Tinker\Support;


/**
 * Class Str
 * @package Tinker\Support
 */
class Str
{
    /**
     * @param string $encodeData
     * @return mixed
     */
    public static function urlSafeEncode(string $encodeData)
    {
        return str_replace(['+', '/'], ['-', '_'], base64_encode($encodeData));
    }

    /**
     * @param string $decodeData
     * @return bool|string
     */
    public static function urlSafeDecode(string $decodeData)
    {
        return base64_decode(str_replace(['-', '_'], ['+', '/'], $decodeData));
    }

    /**
     * @return string
     */
    public static function uuid()
    {
        mt_srand((double) microtime() * 10000);//optional for php 4.2.0 and up.
        $charId = md5(gethostname() . uniqid(mt_rand(), true));
        $hyphen = chr(45);// "-"
        $uuid = substr($charId, 0, 8) . $hyphen
            .substr($charId, 8, 4) . $hyphen
            .substr($charId,12, 4) . $hyphen
            .substr($charId,16, 4) . $hyphen
            .substr($charId,20,12);
        return $uuid;
    }
}
