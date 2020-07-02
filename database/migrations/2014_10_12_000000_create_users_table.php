<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            // Identification
            $table->uuid('id')->primary();
            $table->string('name', 100);
            $table->string('email')->unique();

            // Properties
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->ipAddress('ip_address_register')->nullable();
            $table->json('device_details')->nullable();

            // Status
            $table->boolean('blocked')->default(false);
            $table->string('rank', 30)->default('user');
            $table->timestamps();
            $table->softDeletes();
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
