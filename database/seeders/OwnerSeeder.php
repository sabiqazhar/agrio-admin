<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'windah',
            'email' => 'qwerty@mail.com',
            'phone' => '08873217454',
            'ktp' => '325912937321821'
        ];

        Owner::insert($data);
    }
}
