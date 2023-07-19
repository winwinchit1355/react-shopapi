<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('uuid',191)->unique();
            $table->foreignId('category_id')->nullable()->constrained('categories');
            $table->foreignId('metal_id')->nullable()->constrained('metals');
            $table->foreignId('gemstone_id')->nullable()->constrained('gemstones');
            $table->string('name');
            $table->text('desc')->nullable();
            $table->longText('long_desc')->nullable();
            $table->string('feature_image')->nullable();
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('discount_price')->default(0);
            $table->string('slug')->nullable();
            $table->string('status')->default('active')->comment('active,inactive');
            $table->string('is_feature')->default('inactive')->comment('active,inactive');
            $table->string('SKU')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
