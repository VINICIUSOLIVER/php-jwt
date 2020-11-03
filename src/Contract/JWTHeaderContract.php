<?php

namespace ViniciusOliveira\PhpJwt\Contract;

interface JWTHeaderContract extends JWTStructureContract
{
    /**
     * @return string
     */
    public function getAlg();
    /**
     * @return string
     */
    public function getTyp();
}
