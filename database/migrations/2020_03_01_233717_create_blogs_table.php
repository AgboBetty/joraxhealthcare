<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            // Identification
            $table->bigIncrements('id');
            $table->uuid('user_id')->nullable();

            // Properties
            $table->string('name', 100);
            $table->string('title', 100);
            $table->enum('category', ['news', 'product', 'event']);
            $table->string('image_url', 225);
            $table->longText('text');

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
        Schema::dropIfExists('blogs');
    }
}
