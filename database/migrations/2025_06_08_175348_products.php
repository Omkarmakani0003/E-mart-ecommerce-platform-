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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->decimal('sku')->nullable();
            $table->unsignedBigInteger('supplier_id')->onDelete('cascade');
            $table->unsignedBigInteger('category_id')->onDelete('cascade');
            $table->unsignedBigInteger('sub_category_id')->onDelete('cascade')->nullable();
            $table->text('product_description')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('stock')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('supplier_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
