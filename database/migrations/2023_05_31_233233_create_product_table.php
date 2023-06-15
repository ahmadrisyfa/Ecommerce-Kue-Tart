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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->string('nama');
            $table->string('harga');
            $table->text('deskripsi');
            $table->string('gambar');
            // $table->string('size')->nullable();
            // $table->string('topping')->nullable();
            // $table->integer('viewer')->nullable();
            $table->timestamps();     

            $table->foreign('category_id')->references('id')->on('category'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
