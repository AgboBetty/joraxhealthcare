<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_us', function (Blueprint $table) {
            // Identification
            $table->bigIncrements('id');
            $table->ipAddress('ip_address_current')->nullable();
            $table->json('device_details')->nullable();

            // Properties
            $table->string('name', 50);
            $table->string('email', 50)->nullable();
            $table->string('phone', 20);
            $table->string('company', 50)->nullable();
            $table->text('message');

            // Status
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
        Schema::dropIfExists('contact_us');
    }
}
