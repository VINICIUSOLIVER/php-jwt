<?php
namespace ViniciusOliveira\PhpJwt\Structure;

use ViniciusOliveira\PhpJwt\Contract\JWTHeaderContract;
use ViniciusOliveira\PhpJwt\Encoding\JWTEncoding;
use ViniciusOliveira\PhpJwt\Exception\JWTException;

class JWTHeader implements JWTHeaderContract
{
    /**
     * @var string
     */
    private $alg;
    /**
     * @var string
     */
    private $typ;
    /**
     * JWTHeader constructor.
     * @param string $alg
     * @param string $typ
     */
    public function __construct($alg, $typ = "JWT")
    {
        $this->alg = $alg;
        $this->typ = $typ;
    }
    /**
     * @return string
     * @throws JWTException
     */
    public function generate()
    {
        try {
            $content = [
                "alg" => $this->alg,
                "typ" => $this->typ
            ];

            return JWTEncoding::encodingBASE64URL(JWTEncoding::encodingJSON($content));
        } catch (\Exception $e) {
            throw new JWTException("header_not_generated", $e->getMessage(), $e->getCode());
        }
    }
    /**
     * @return string
     */
    public function getAlg()
    {
        return $this->alg;
    }
    /**
     * @param $alg
     * @return $this
     */
    public function setAlg($alg)
    {
        $this->alg = $alg;

        return $this;
    }
    /**
     * @return string
     */
    public function getTyp()
    {
        return $this->typ;
    }
    /**
     * @param $typ
     * @return $this
     */
    public function setTyp($typ)
    {
        $this->typ = $typ;

        return $this;
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