<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

            // Identification
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();

            // Properties
            $table->string('image', 255);
            $table->string('type', 100);
            $table->string('name', 225);
            $table->string('abbr', 10)->nullable();
            $table->double('amount', 8, 2)->nullable();
            $table->text('about')->nullable();

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
        Schema::dropIfExists('products');
    }
}
