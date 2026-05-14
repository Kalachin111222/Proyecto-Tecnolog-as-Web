<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'usuario'    => 'admin',
                'password'   => Hash::make('123456'),
                'rol'        => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'usuario'    => 'cliente',
                'password'   => Hash::make('123456'),
                'rol'        => 'cliente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
