<?php
namespace ViniciusOliveira\PhpJwt;

use ViniciusOliveira\PhpJwt\Contract\JWTHeaderContract;
use ViniciusOliveira\PhpJwt\Contract\JWTStructureContract;
use ViniciusOliveira\PhpJwt\Structure\JWTSignature;

class JWT
{
    /**
     * @var JWTHeaderContract
     */
    private $header;
    /**
     * @var JWTStructureContract
     */
    private $payload;
    /**
     * @var JWTStructureContract
     */
    private $signature;
    /**
     * @var string
     */
    private $secret;
    /**
     * JWT constructor.
     * @param JWTStructureContract $header
     * @param JWTStructureContract $payload
     * @param string $secret
     */
    public function __construct(JWTStructureContract $header, JWTStructureContract $payload, $secret)
    {
        $this->header = $header;
        $this->payload = $payload;
        $this->secret = $secret;
        $this->signature = new JWTSignature($this->header, $this->payload, $this->secret);
    }
    /**
     * @return string
     * @throws Exception\JWTException
     */
    public function getToken()
    {
        $header = $this->header->generate();
        $payload = $this->payload->generate();
        $signature = $this->signature->generate();

        return "{$header}.{$payload}.{$signature}";
    }
    /**
     * @param string $token
     * @return array
     */
    public static function extractToken(string $token)
    {
        return explode(".", $token);
    }

    public static function validateToken(string $token, string $secret)
    {
        list($header, $payload, $signature) = self::extractToken($token);

        dd($header, $payload, $signature);
    }
}