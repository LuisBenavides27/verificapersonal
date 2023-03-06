<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Datos>
 */
class DatosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'cedula' => $this->faker->unique()->numberBetween(87654145,1085316583),
            'nombres' => $this->faker->word(20),
            'cargo' => $this->faker->word(20),
            'lugar_nacimiento' => $this->faker->word(10),
            'fecha_nacimiento' => $this->faker->date(),
            'fecha_expedicion' => $this->faker->date(),
            'altura' => $this->faker->randomElement([155,159,165,182,195,202,205]),
            'sexo' => $this->faker->randomElement(['Masculino','Femenino']),
            'Grupo_Sanguineo' => $this->faker->word(2),
            'user_id' => User::all()->random()->id,
        ];
    }
}