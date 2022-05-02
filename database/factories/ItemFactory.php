<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'=> User::all()->random()->id,
            'name' => $this->faker->word(),
            'content' => $this->faker->text(),
            'type' => $this->faker->randomDigit(),
            'active' => $this->faker->boolean(),
        ];
    }
}
