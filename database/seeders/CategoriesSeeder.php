<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('categories')->insert([
        //     'name' => Str::random(10),
        //     'description' => Str::random(10),
        // ]);

        //Sin Asignar
        DB::table('categories')->insert([
            'name' => 'Sin Asignar',
            'description' => 'undefined',
        ]);

        //General
        DB::table('categories')->insert([
            'name' => 'General',
            'description' => 'Seccion de caracter general.',
        ]);

        //Actualidad
        DB::table('categories')->insert([
            'name' => 'Actualidad',
            'description' => 'Seccion de noticias.',
        ]);

        //Consulta
        DB::table('categories')->insert([
            'name' => 'Consulta',
            'description' => 'Seccion con contenido divulgativo o informativo.',
        ]);

    }
}
