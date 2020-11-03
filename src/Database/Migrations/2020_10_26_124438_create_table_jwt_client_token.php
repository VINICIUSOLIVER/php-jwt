<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableJwtClientToken extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jwt_client_token', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->longText("token");
            $table->string("responsible_id");
            $table->timestamp("expired")->nullable(true);
            $table->json("information")->nullable(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jwt_client_token');
    }
}
