<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->realText(50);
        return [
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'thumbnail' => fake()->imageUrl,
            'content' => fake()->realText(5000),
            'is_published' => fake()->boolean,
            'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'author_id' => 1,
        ];
    }
}
