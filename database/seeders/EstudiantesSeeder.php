<?php

namespace Database\Seeders;

use App\Models\Estudiante;
use Database\Factories\EstudiantesFactory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EstudiantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estudiante::factory()->count(100)->create();
    }
}
