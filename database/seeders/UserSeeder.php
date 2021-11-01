<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'FreeUser',
                'email' => 'free@mail.com',
                'phone_no' => '0123456789',
                'is_premium' => 0,
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'PremiumUser',
                'email' => 'premium@mail.com',
                'phone_no' => '0123456789',
                'is_premium' => 1,
                'password' => Hash::make('password'),
            ]
        ]);
    }
}
