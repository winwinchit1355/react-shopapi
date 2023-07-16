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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->foreignId('customer_id')->constrained('customers');
            // $table->foreignId('delivery_fee_id')->constrained('delivery_fees');
            $table->datetime('invoice_date')->nullable(); //customer ordered date
            $table->datetime('estimated_delivery_time')->nullable();
            $table->datetime('confirm_date')->nullable(); //admin confirm customer order
            $table->datetime('shipping_date')->nullable(); //start delivered date
            $table->datetime('delivered_date')->nullable(); //complete delivered date
            $table->datetime('cancelled_date')->nullable(); //cancel order date
            $table->datetime('onhold_date')->nullable();
            $table->datetime('refunded_date')->nullable(); //order refunded date
            $table->string('payment_method')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('shipping_method')->nullable();
            $table->integer('total_products');
            $table->integer('total_gifts')->nullable();
            $table->integer('amount');
            $table->integer('delivery_fee');
            $table->integer('paid_amount')->nullable();
            $table->integer('tax_amount')->nullable();
            $table->integer('discount_amount')->nullable();
            // $table->integer('discount_per')->nullable();
            $table->string('order_status')->default('pending')->comment('pending,confirm,shipped,delivered,cancelled,onhold');
            $table->string('payment_status')->default('unpaid')->comment('paid,unpaid,refunded');
            $table->text('customer_note')->nullable();
            $table->text('remark')->nullable();
            $table->text('reason')->nullable();
            $table->softDeletes();
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
};
