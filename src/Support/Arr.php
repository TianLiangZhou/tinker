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
     * @param bool $encode
     * @return Str
     */
    public static function sortQuery(array $array, callable $encode = null): string
    {
        ksort($array);
        $query = '';
        foreach ($array as $key => $value) {
            if ($value == '' || $value == null || is_array($value)) {
                continue;
            }
            $query .= "$key=" . ($encode ? call_user_func($encode, $value) : $value) . '&';
        }
        return rtrim($query, '&');
    }

    /**
     * @param array $headers
     * @param string $split
     * @return string
     */
    public static function header(array $headers, callable $encode = null): array
    {
        ksort($headers);
        foreach ($headers as $name => $value) {
            $join[] = ($encode ? call_user_func($encode, strtolower($name)) : $name)
                . ':'
                . ($encode ? call_user_func($encode, $value) : $value);
        }
        return $join;
    }

    /**
     * @param array $array
     * @return Str
     */
    public static function query(array $array): string
    {
        return http_build_query($array, null, '&', PHP_QUERY_RFC3986);
    }
}
