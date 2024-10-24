<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        DB::table('users')->insert([
            'name'=> 'Usuario ADMIN',
            'email' => 'admin@spaziocipriano.com.br',
            'email_verified_at' => now(),
            'password' => Hash::make('spaziocipriano'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        DB::table('users')->insert([
            'name'=> 'Isaias',
            'email' => 'isaias@visioit.com.br',
            'email_verified_at' => now(),
            'password' => Hash::make('k7y7s2m7'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
