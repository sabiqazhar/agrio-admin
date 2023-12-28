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
        Schema::table('margin', function (Blueprint $table) {
            $table->double('total_margin')->nullable()->change();
            $table->double('percentage_margin')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('margin', function (Blueprint $table) {
            $table->integer('total_margin')->nullable();
            $table->integer('percentage_margin')->nullable();
        });
    }
};
