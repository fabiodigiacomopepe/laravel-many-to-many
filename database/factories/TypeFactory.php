<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Type>
 */
class TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => fake() -> randomElement(['Web App', 'Single Page App', 'Sito vetrina']),
            'di_gruppo' => fake() -> numberBetween(0, 1)
        ];
    }
}
