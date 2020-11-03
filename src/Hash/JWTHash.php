<?php
namespace ViniciusOliveira\PhpJwt\Hash;

use ViniciusOliveira\PhpJwt\Exception\JWTException;

class JWTHash
{
    /**
     * @var array
     */
    private static $hashAlgos = [
        "HS256" => "sha256"
    ];
    /**
     * @param $alg
     * @param $data
     * @param $secret
     * @return string
     * @throws JWTException
     */
    public static function hash($alg, $data, $secret)
    {
        if (!array_key_exists($alg, self::$hashAlgos)) {
            throw new JWTException("hash_not_found");
        }

        try {
            return hash_hmac(self::$hashAlgos[$alg], $data, $secret, true);
        } catch (\Exception $e) {
            throw new JWTException("hash_not_generated", $e->getMessage(), $e->getCode());
        }
    }
}
