<?php


namespace Tinker\Support;


use Exception;

/**
 * Class Openssl
 * @package Tinker\Support
 */
class Openssl
{
    /**
     * @param $data
     * @param $privateRsa
     * @return mixed
     * @throws Exception
     */
    public static function privateDecrypt($data, $privateRsa)
    {
        $resource = self::loadPrivateRsa($privateRsa);
        openssl_private_decrypt($data, $decrypt, $resource);
        is_resource($resource) && openssl_free_key($resource);
        return $decrypt;
    }


    /**
     * @param string $data
     * @param string $signature
     * @param string $rsa
     * @param int $alg
     * @return bool
     * @throws Exception
     */
    public static function verify(string $data, string $signature, string $rsa, int $alg = OPENSSL_ALGO_SHA1)
    {
        $resource = self::loadPublicRsa($rsa);
        $result = (openssl_verify($data, $signature, $resource, $alg) === 1);
        is_resource($resource) && openssl_free_key($resource);
        return $result;
    }

    /**
     * @param string $data
     * @param string $rsa
     * @param int $alg
     * @return string
     * @throws Exception
     */
    public static function signature(string $data, string $rsa, int $alg = OPENSSL_ALGO_SHA1, bool $safeBase64 = false)
    {
        $resource = self::loadPrivateRsa($rsa);
        openssl_sign($data, $signature, $resource, $alg);
        is_resource($resource) && openssl_free_key($resource);
        if ($safeBase64) {
            return Str::urlSafeEncode($signature);
        }
        return base64_encode($signature);
    }

    /**
     * @param $rsa
     * @return resource|string
     * @throws Exception
     */
    public static function loadPublicRsa($rsa)
    {
        if (is_file($rsa)) {
            $res = openssl_get_publickey(file_get_contents($rsa));
        } else {
            $res = "-----BEGIN PUBLIC KEY-----\n" .
                    wordwrap($rsa, 64, "\n", true) .
                    "\n-----END PUBLIC KEY-----";
        }
        if (empty($res)) {
            throw new Exception("Rsa read error");
        }
        return $res;
    }

    /**
     * @param $rsa
     * @return resource|string
     * @throws Exception
     */
    public static function loadPrivateRsa($rsa)
    {
        if (!is_file($rsa)) {
            $resource = "-----BEGIN RSA PRIVATE KEY-----\n" .
                wordwrap($rsa, 64, "\n", true) .
                "\n-----END RSA PRIVATE KEY-----";
        } else {
            $resource = openssl_get_privatekey(file_get_contents($rsa));
        }
        if (empty($res)) {
            throw new Exception("Rsa read error");
        }
        return $resource;
    }

}
