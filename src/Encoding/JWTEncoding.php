<?php
namespace ViniciusOliveira\PhpJwt\Encoding;

class JWTEncoding
{
    /**
     * @param $data
     * @return string
     */
    public static function encodingJSON($data)
    {
        return json_encode($data);
    }
    /**
     * @param mixed $data
     * @return string
     */
    public static function encodingBASE64URL($data)
    {
        return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($data));
    }
}