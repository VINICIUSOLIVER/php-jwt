<?php
namespace ViniciusOliveira\PhpJwt\Structure;

use ViniciusOliveira\PhpJwt\Contract\JWTStructureContract;
use ViniciusOliveira\PhpJwt\Encoding\JWTEncoding;
use ViniciusOliveira\PhpJwt\Exception\JWTException;

class JWTPayload implements JWTStructureContract
{
    /**
     * @var array
     */
    protected $content;
    /**
     * JWTPayload constructor.
     * @param array $content
     */
    public function __construct(array $content = [])
    {
        $this->content = $content;
    }
    /**
     * @throws JWTException
     */
    public function generate()
    {
        try {
            return JWTEncoding::encodingBASE64URL(JWTEncoding::encodingJSON($this->content));
        } catch (\Exception $e) {
            throw new JWTException("payload_not_generated", $e->getMessage(), $e->getCode());
        }
    }
    /**
     * @param string $key
     * @param null $value
     * @return $this
     */
    public function addContent(string $key, $value = null)
    {
        $this->content[$key] = $value;

        return $this;
    }
    /**
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public function getDataContent(string $key, $default = null)
    {
        if (array_key_exists($key, $this->content)) {
            return $this->content[$key];
        }

        return $default;
    }
}
