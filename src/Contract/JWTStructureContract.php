<?php
namespace ViniciusOliveira\PhpJwt\Contract;

interface JWTStructureContract
{
    /**
     * @return string
     */
    public function generate();
}