<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            // Identification
            $table->uuid('id');
            $table->uuid('user_id')->primary();
            $table->string('user_name', 100);

            // Properties
            $table->ipAddress('ip_address_current')->nullable();

            // Properties - profile
            $table->string('mail', 100)->nullable();
            $table->string('phone',25)->nullable();
            $table->string('address', 250)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('country', 30)->nullable();
            $table->string('zip', 10)->nullable();

            // Status
            $table->integer('total_votes')->unsigned()->default(0);
            $table->integer('user_rating')->unsigned()->default(0);
            $table->string('user_standing', 15)->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
