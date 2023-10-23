<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::transaction(function(){
            DB::table('users')->insert([
                'name'              => 'Superadmin Agrio',
                'email'             => 'admin@agrio.id',
                'email_verified_at' => now(),
                'password'          => bcrypt("#Adminagrio#2023"),
                'roles'             => '99',
                'active'            => 1,
            ]);
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
