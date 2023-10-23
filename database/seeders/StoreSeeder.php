<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'user_id' => '1',
            'owner_id' => '1',
            'name' => 'dewa makmur',
            'lat' => '22',
            'lon' => '149',
            'address' => 'jl.makmur 2',
            'phone' => '08992134483',
            'active' => '1'
        ];

        Store::insert($data);
    }
}
