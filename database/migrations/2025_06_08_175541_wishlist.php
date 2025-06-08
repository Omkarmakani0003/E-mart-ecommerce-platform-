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
        Schema::create('wishlist', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id')->onDelete('cascade');
            $table->unsignedBigInteger('product_id')->onDelete('cascade')->nullable();
            $table->unsignedBigInteger('product_variant_id')->onDelete('cascade')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('qty')->nullable();
            $table->timestamps();

            $table->foreign('supplier_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('product_variant_id')->references('id')->on('product_variant');
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
