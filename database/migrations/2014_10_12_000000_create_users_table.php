<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Wandxx\Support\Constants\ActiveStatus;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("phone")->unique();
            $table->timestamp("phone_verified_at")->nullable();
            $table->string("email")->unique();
            $table->timestamp("email_verified_at")->nullable();
            $table->timestamp("data_verified_at")->nullable();
            $table->unsignedTinyInteger("role");
            $table->string("password");
            $table->boolean("active")->default(ActiveStatus::INACTIVE);
            $table->double("lat")->nullable();
            $table->double("lng")->nullable();
            $table->json("metadata")->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
