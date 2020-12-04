<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuccessOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('success_order', function (Blueprint $table) {
            $table->id();
            $table->string('orderNo');
            $table->string('user_id');
            $table->string('topup_id');
            $table->string('product_id');
            $table->string('topupBalance');
            $table->string('productPage');
            $table->integer('status')->default('0');
            $table->string('keterangan')->nullable();
            $table->datetime('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('success_order');
    }
}
