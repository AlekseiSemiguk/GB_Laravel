<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\NewsSource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        News::factory()
            ->count(30)
            ->state(new Sequence(
                fn ($sequence) => [
                    'category_id' => Category::all()->random(),
                    'news_source_id' => NewsSource::all()->random()
                ],
            ))
            ->create();
    }
}
