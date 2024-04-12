<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassroomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classrooms')->insert([
            'class_name' => 'Aula 1',
            'user_id' => 5,
            'stage_id' => 1,
            'level_id' => 2,
        ]);
        DB::table('classrooms')->insert([
            'class_name' => 'Aula 2',
            'user_id' => 5,
            'stage_id' => 1,
            'level_id' => 2,
        ]);
        DB::table('classrooms')->insert([
            'class_name' => 'Aula 3',
            'user_id' => 5,
            'stage_id' => 1,
            'level_id' => 2,
        ]);
        DB::table('classrooms')->insert([
            'class_name' => 'Aula 4',
            'user_id' => 5,
            'stage_id' => 1,
            'level_id' => 2,
        ]);
        DB::table('classrooms')->insert([
            'class_name' => 'Aula 5',
            'user_id' => 5,
            'stage_id' => 1,
            'level_id' => 2,
        ]);
        DB::table('classrooms')->insert([
            'class_name' => 'Aula 6',
            'user_id' => 5,
            'stage_id' => 1,
            'level_id' => 2,
        ]);
    }
}
