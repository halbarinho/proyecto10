<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Docente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Docente>
 */
class DocenteFactory extends Factory
{

    protected $model = Docente::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $user = User::factory()->create(['user_type' => 'docente']);

        return [
            'speciality' => fake()->randomElement(['Historia', 'Matematicas', 'Geografia', 'Ingles']),
            'user_id' => $user->id,
        ];
    }
}
