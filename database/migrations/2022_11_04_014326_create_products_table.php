<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('kode_product');
            $table->string('name_product');
            $table->text('description_product');
            $table->integer('jml_product');
            $table->integer('price_product');
            $table->tinyInteger('trending')->default('0')->comment('0=no-trending,1=trending');
            $table->tinyInteger('featured')->default('0')->comment('0=no-featured,1=featured');
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
};