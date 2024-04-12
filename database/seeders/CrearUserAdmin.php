<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CrearUserAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $password = "123456789";

        // DB::table('users')->insert([

        //     'dni' => '25197092B',
        //     'name' => 'admin',
        //     'last_name_1' => 'admin',
        //     'last_name_2' => 'admin',
        //     'gender' => 'male',
        //     'email' => 'admin@admin.com',
        //     // 'password' => Hash::make($password),
        //     // 'password' => bcrypt($password),
        //     'password' => Hash::make($password),
        //     'profile_photo_path' => 'unknow'
        // ]);

        $userAdmin = User::create([
            'dni' => '44132287W',
            'name' => 'admin',
            'last_name_1' => 'admin',
            'last_name_2' => 'admin',
            'gender' => 'male',
            'email' => 'admin@admin.com',
            // 'password' => Hash::make($password),
            // 'password' => bcrypt($password),
            'password' => $password,
            'profile_photo_path' => 'unknow'
        ]);

        $userAdmin->assignRole('admin');

    }
}
