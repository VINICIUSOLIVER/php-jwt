<?php

namespace ViniciusOliveira\PhpJwt\Models;

use Illuminate\Database\Eloquent\Model;

class JwtClientToken extends Model
{
    /**
     * @var string
     */
    protected $table = "jwt_client_token";
    /**
     * @var array
     */
    protected $casts = [
        "id" => "string",
        "token" => "string",
        "responsible_id" => "string",
        "information" => "string"
    ];
    /**
     * @var array
     */
    protected $dates = [
        "expired",
        "created_at",
        "updated_at"
    ];
}
