<?php
namespace ViniciusOliveira\PhpJwt\Structure;

use ViniciusOliveira\PhpJwt\Contract\JWTHeaderContract;
use ViniciusOliveira\PhpJwt\Contract\JWTStructureContract;
use ViniciusOliveira\PhpJwt\Encoding\JWTEncoding;
use ViniciusOliveira\PhpJwt\Exception\JWTException;
use ViniciusOliveira\PhpJwt\Hash\JWTHash;

class JWTSignature implements JWTStructureContract
{
    /**
     * @var JWTStructureContract
     */
    private $header;
    /**
     * @var JWTStructureContract
     */
    private $payload;
    /**
     * @var string
     */
    private $secret;
    /**
     * JWTSignature constructor.
     * @param JWTHeaderContract $header
     * @param JWTStructureContract $payload
     * @param string $secret
     */
    public function __construct(JWTHeaderContract $header, JWTStructureContract $payload, $secret)
    {
        $this->header = $header;
        $this->payload = $payload;
        $this->secret = $secret;
    }
    /**
     * @throws JWTException
     * @return string
     */
    public function generate()
    {
        try {
            $header = $this->header->generate();
            $payload = $this->payload->generate();
            $signature = JWTHash::hash($this->header->getAlg(), "{$header}.{$payload}", $this->secret);

            return JWTEncoding::encodingBASE64URL($signature);
        } catch (\Exception $e) {
            throw new JWTException("signature_not_generated", $e->getMessage(), $e->getCode());
        }
    }
    /**
     * @return string
     * @throws JWTException
     */
    public function __toString()
    {
        return $this->generate();
    }
}
