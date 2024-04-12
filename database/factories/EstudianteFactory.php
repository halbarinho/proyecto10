<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Estudiante;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudiante>
 */
class EstudianteFactory extends Factory
{

    protected $model = Estudiante::class;



    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // $dni = $this->obtenerDni();

        $user = User::factory()->create(['user_type' => 'estudiante']);


        return [
            //

            'date_of_birth' => fake()->date(),
            'history' => fake()->text(),
            'user_id' => $user->id,
        ];
    }



}
