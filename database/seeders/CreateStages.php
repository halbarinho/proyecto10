<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateStages extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('stages')->insert([
            'id' => 1,
            'stage_name' => 'primaria',
        ]);
        DB::table('stages')->insert([
            'id' => 2,
            'stage_name' => 'secundaria',
        ]);
        DB::table('stages')->insert([
            'id' => 3,
            'stage_name' => 'bachillerato',
        ]);

    }
}
