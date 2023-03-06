<?php

namespace Database\Factories;

use App\Models\Datos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Images>
 */
class ImagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'url' => 'prueba/'. $this->faker->image('public/storage/prueba', 640,480,null,false),
            'datos_id' => Datos::all()->random()->cedula,
        ];
    }
}
