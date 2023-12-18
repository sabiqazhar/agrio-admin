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
        Schema::create('transaction', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('product_id');
            $table->string('customer_name');
            $table->integer('type_costomer');
            $table->bigInteger('total_price');
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('users_id')
            ->references('id')->on('users')
            ->restrictOnUpdate()
            ->restrictOnDelete();

            $table->foreign('product_id')
            ->references('id')->on('product')
            ->restrictOnUpdate()
            ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction');
    }
};
