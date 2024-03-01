<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateStageLevels extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        // DB::table('stage_levels')->insert([
        //         'level_name'=>,
        //         'stage_id'=>'',
        // ]);


        /**
         * PRIMARIA
         */
        DB::table('stage_levels')->insert([
            'level_name' => '1º',
            'stage_id' => '1',
        ]);
        DB::table('stage_levels')->insert([
            'level_name' => '2º',
            'stage_id' => '1',
        ]);
        DB::table('stage_levels')->insert([
            'level_name' => '3º',
            'stage_id' => '1',
        ]);
        DB::table('stage_levels')->insert([
            'level_name' => '4º',
            'stage_id' => '1',
        ]);
        DB::table('stage_levels')->insert([
            'level_name' => '5º',
            'stage_id' => '1',
        ]);
        DB::table('stage_levels')->insert([
            'level_name' => '6º',
            'stage_id' => '1',
        ]);

        /**
         * SECUNDARIA
         */
        DB::table('stage_levels')->insert([
            'level_name' => '1º',
            'stage_id' => '2',
        ]);
        DB::table('stage_levels')->insert([
            'level_name' => '2º',
            'stage_id' => '2',
        ]);
        DB::table('stage_levels')->insert([
            'level_name' => '3º',
            'stage_id' => '2',
        ]);
        DB::table('stage_levels')->insert([
            'level_name' => '4º',
            'stage_id' => '2',
        ]);


        /**
         * BACHILLERATO
         */

        DB::table('stage_levels')->insert([
            'level_name' => '1º',
            'stage_id' => '3',
        ]);
        DB::table('stage_levels')->insert([
            'level_name' => '2º',
            'stage_id' => '3',
        ]);
    }
}
