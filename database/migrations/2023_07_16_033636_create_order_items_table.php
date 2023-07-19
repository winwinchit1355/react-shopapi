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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->string('uuid',191)->unique();
            $table->foreignId('order_id')->constrained('orders');
            $table->foreignId('product_id')->constrained('products');
            $table->integer('ordered_qty');
            $table->integer('received_qty')->nullable();
            $table->integer('cancel_qty')->nullable();
            $table->integer('gift_qty')->nullable();
            $table->integer('sale_price');
            $table->integer('promotion_price')->nullable();
            // $table->string('promotion_no')->nullable();
            // $table->unsignedBigInteger('promotable_id')->nullable();
            // $table->string('promotable_type')->nullable();
            $table->string('order_status')->default(1)->comment('pending,confirm,shipped,delivered,cancelled,onhold');
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
        Schema::dropIfExists('order_items');
    }
};
