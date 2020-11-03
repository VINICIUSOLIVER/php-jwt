<?php

namespace ViniciusOliveira\PhpJwt\Config;

class JWTConfig
{
    /**
     * @var int
     */
    private static $minutesToExpired = null;
    /**
     * @return int
     */
    public static function getMinutesToExpired()
    {
        return self::$minutesToExpired;
    }
    /**
     * @param $minutes
     */
    public static function minutesToExpired(int $minutes = null)
    {
        self::$minutesToExpired = $minutes;
    }
}
