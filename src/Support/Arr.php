<?php


namespace Tinker\Support;


/**
 * Class Arr
 * @package Tinker\Support
 */
class Arr
{
    /**
     * 根据key排序转换成http query
     *
     * @param array $array
     * @param bool $isEncode
     * @return string
     */
    public static function keySortQuery(array $array, $isEncode = false)
    {
        ksort($array);
        $query = '';
        foreach ($array as $key => $value) {
            if ($value == '' || $value == null || is_array($value)) {
                continue;
            }
            $query .= "$key=" . ($isEncode ? urlencode($value) : $value) . '&';
        }
        return rtrim($query, '&');
    }

    /**
     * @param array $array
     * @return string
     */
    public static function query(array $array)
    {
        return http_build_query($array, null, '&', PHP_QUERY_RFC3986);
    }
}
