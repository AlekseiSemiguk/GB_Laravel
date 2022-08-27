<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\News;
use App\Models\NewsSource;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(7),
            'anonce' => fake()->text(100),
            'author' => fake()->name(),
            'status' => News::DRAFT,
            'image' => fake()->imageUrl(),
            'description' => fake()->paragraphs(3, true),
            'date' => fake()->dateTimeBetween('-1 year'),
            'category_id' => Category::factory(),
            'news_source_id' => NewsSource::factory()
        ];
    }
}
