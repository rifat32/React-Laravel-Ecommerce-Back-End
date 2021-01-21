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
            $table->id();
            $table->string('custom_id');
            $table->string('name');
            $table->text('descriptionIntroduction');
            $table->text('descriptionFeatures');
            $table->string('currentPrice',10);
            $table->string('previousPrice',10)->nullable();
            $table->text('image_1');
            $table->text('image_2');
            $table->text('image_3');
            $table->string('category');
            $table->text('tags');
            $table->string('stock')->nullable();
            $table->string('sizes')->nullable();
            $table->string('colors')->nullable();
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
        Schema::dropIfExists('products');
    }
}
