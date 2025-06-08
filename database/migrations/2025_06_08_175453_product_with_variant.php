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
        Schema::create('product_with_variant', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('variable_id')->onDelete('cascade');
            $table->unsignedBigInteger('product_variant_id')->onDelete('cascade');
            $table->timestamps();
    
            $table->foreign('variable_id')->references('id')->on('variant');
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
