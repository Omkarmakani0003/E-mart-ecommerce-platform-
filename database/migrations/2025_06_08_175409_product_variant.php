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
        Schema::create('product_variant', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->onDelete('cascade');
            $table->string('sku');
            $table->decimal('price')->nullable();
            $table->decimal('stock')->nullable();
            $table->text('product_description')->nullable();
            $table->string('status');
            $table->timestamps();
    
            $table->foreign('product_id')->references('id')->on('product');
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
