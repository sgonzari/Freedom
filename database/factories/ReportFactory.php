<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fk_user' => $this->faker->numberBetween(1, 10),
            'fk_post' => $this->faker->numberBetween(1, 30),
            'reason' => $this->faker->text(200)
        ];
    }
}
