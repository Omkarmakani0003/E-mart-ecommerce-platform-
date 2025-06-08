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
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('orderId');
            $table->unsignedBigInteger('supplier_id')->onDelete('cascade');
            $table->decimal('total_amount')->nullable();
            $table->decimal('total_qty')->nullable();
            $table->string('payment_status');
            $table->text('shipping_address');
            $table->date('register_date');
            $table->enum('status',['proccess','shipped','delivered','canceled']);
            $table->timestamps();

            $table->foreign('supplier_id')->references('id')->on('users');
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
