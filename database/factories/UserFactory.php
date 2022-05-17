<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "fk_rol" => $this->faker->numberBetween(1, 2),
            "name" => $this->faker->name(),
            "username" => $this->faker->username(),
            "email" => $this->faker->unique()->safeEmail(),
            "password" => Hash::make("usuario"),
            "birthday" => date('Y-m-d H:i:s', strtotime($this->faker->date())),
            // "profile_image" => 'users/' . $this->faker->image('public/storage/users', 50, 50, null, false),
            "description" => $this->faker->text(50)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
