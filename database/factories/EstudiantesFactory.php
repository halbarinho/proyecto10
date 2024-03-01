<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EstudiantesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //

            'date_of_birth' => fake()->date(),
            'history' => fake()->text(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Estudiante $estudiante) {
            $user = User::factory()->create(); // Crea un curso
            $estudiante->id = $user->id; // Asigna el ID del curso al estudiante
            $estudiante->save();
        });
    }
}
