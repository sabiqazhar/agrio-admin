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
        Schema::table('store', function (Blueprint $table) {
            $table->foreign('user_id', 'fk_user_id_to_user')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('owner_id', 'fk_owner_id_to_owner')->references('id')->on('owner')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('store', function (Blueprint $table) {
            $table->dropForeign('fk_user_id_to_user');
            $table->dropForeign('fk_owner_id_to_owner');
        });
    }
};
