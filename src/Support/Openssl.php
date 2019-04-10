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
     * @param string $data
     * @param string $signature
     * @param string $rsa
     * @param int $alg
     * @return bool
     * @throws Exception
     */
    public static function verify(string $data, string $signature, string $rsa, int $alg = OPENSSL_ALGO_SHA1)
    {
        $isFile = false;
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
        $result = (openssl_verify($data, $signature, $res, $alg) === 1);
        $isFile && openssl_free_key($res);
        return $result;
    }

    /**
     * @param string $data
     * @param string $rsa
     * @param int $alg
     * @return string
     */
    public static function signature(string $data, string $rsa, int $alg = OPENSSL_ALGO_SHA1)
    {
        $isFile = false;
        if (!is_file($rsa)) {
            $resource = "-----BEGIN RSA PRIVATE KEY-----\n" .
                wordwrap($rsa, 64, "\n", true) .
                "\n-----END RSA PRIVATE KEY-----";
        } else {
            $resource = openssl_get_privatekey(file_get_contents($rsa));
            $isFile = true;
        }
        openssl_sign($data, $signature, $resource, $alg);
        $isFile && openssl_free_key($resource);
        return base64_encode($signature);
    }

}
