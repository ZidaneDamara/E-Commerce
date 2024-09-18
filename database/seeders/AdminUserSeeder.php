<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'), // Ganti 'password' dengan kata sandi yang Anda inginkan
            'role' => 'admin',  
        ]);

        DB::table('customers')->insert([
            'customer_name' => 'Zidaane Damara',
            'email' => 'zidaned12@gmail.com', 
            'password' => Hash::make('12345678'), 
            'country' => 'Indonesia',
            'address' => 'Jl.Kemping Blok D.9',
            'city' => 'Pekanbaru',
            'province'=>'Riau',
            'phone_number'=> '08123456789',
            'postal_code'=> '28262',
        ]);
        DB::table('customers')->insert([
            'customer_name' => 'Zidane',
            'email' => 'zidaned13@gmail.com', 
            'password' => Hash::make('12345678'), 
            'country' => 'Malaysia',
            'address' => 'Jl.Kemping Blok C.11',
            'city' => 'Pekanbaru',
            'province'=>'Riau',
            'phone_number'=> '082288136874',
            'postal_code'=> '28262',
        ]);
    }
}