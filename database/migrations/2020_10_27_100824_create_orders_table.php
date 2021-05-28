<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id');
            $table->integer('user_id');
            $table->integer('order_price');
            $table->integer('payable_price');
            $table->enum('status', ['received', 'packed', 'shipped', 'delivered']);
            $table->enum('payment_type', ['cod', 'online']);
            $table->string('delivered_date')->nullbale();
            $table->integer('coupon_id')->nullbale();
            $table->integer('coupon_amount')->nullbale();
            $table->integer('delivery_charge')->nullbale();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
