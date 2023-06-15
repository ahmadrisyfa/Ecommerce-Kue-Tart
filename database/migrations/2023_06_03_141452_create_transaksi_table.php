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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id');
            $table->string('total');
            $table->string('foto_transaksi');
            $table->string('quantity');
            $table->unsignedBigInteger('size_id');
            $table->string('proses')->default('0')->comment('1=Sudah Di Konfirmasi,0=Menunggu Di Konfirmasi');
            $table->string('toppings')->nullable();


            $table->timestamps();
            $table->foreign('size_id')->references('id')->on('size')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};
