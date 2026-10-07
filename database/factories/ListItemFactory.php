<?php

namespace Database\Factories;

use App\Models\ListItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ListItem>
 */
class ListItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'summary' => $this->faker->sentence(),
            'user_id' => User::inRandomOrder()->value('id') ?? User::factory(),
            'active' => false
        ];
    }
}
