<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CrearUserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $password = "adminPassword";
        DB::table('users')->insert([

            'dni' => '25197092B',
            'name' => 'admin',
            'last_name_1' => 'admin',
            'last_name_2' => 'admin',
            'gender' => 'male',
            'email' => 'admin@admin.com',
            // 'password' => Hash::make($password),
            // 'password' => bcrypt($password),
            'password' => Hash::make($password),
            'profile_photo_path' => 'unknow'
        ]);
    }
}
