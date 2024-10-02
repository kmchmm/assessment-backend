<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AddressSeeder extends Seeder
{
    public function run()
    {
        DB::table('addresses')->insert([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
