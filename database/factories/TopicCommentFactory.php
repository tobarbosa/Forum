<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Model;
use App\Models\Topic;
use App\Models\TopicComment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class TopicCommentFactory extends Factory
{
    protected $model = TopicComment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment' => $this->faker->sentence(),
            'user_id' => User::inRandomOrder()->value('id') ?? User::factory(),
            'topic_id' => Topic::inRandomOrder()->value('id') ?? Topic::factory()
        ];
    }
}
