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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('uuid',191)->unique();
            $table->binary('profile_image')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->text('address');
            $table->text('shipping_address')->nullable();
            $table->string('password');
            $table->datetime('login_at')->nullable();
            $table->datetime('register_at')->nullable();
            $table->string('timezone')->nullable();
            $table->string('status')->default('active')->comment('active,inactive');
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('customers');
    }
};
