<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => fake() -> sentence(3),
            'framework' => fake() -> randomElement(['Laravel', 'Vue', 'Angular', 'React']),
            'versione' => fake() -> randomFloat(1, 10, 20),
            'deployato' => fake() -> numberBetween(0, 1)
        ];
    }
}
