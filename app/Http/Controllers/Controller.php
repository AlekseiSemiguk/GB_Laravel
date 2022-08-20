<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
        $this->categories = $this->generateCategories();
    }

    public function getNews($filters = array(), int $id = null): array
    {
        $news = [];

        if($id) {
            return [
                'title'         => $this->faker->jobTitle(),
                'author'        => $this->faker->userName(),
                'status'        => 'DRAFT',
                'description'   =>  $this->faker->text(1000),
                'anonce'        =>  $this->faker->text(100),
                'created_at'    => now('Europe/Moscow'),
                'category'      => $this->faker->word()
            ];
        }

        foreach ($this->categories as $category) {
            for($i=1; $i<5; $i++) {
                $news[] = [
                    'title'         => $this->faker->jobTitle(),
                    'author'        => $this->faker->userName(),
                    'status'        => 'DRAFT',
                    'description'   =>   $this->faker->text(1000),
                    'anonce'        =>  $this->faker->text(100),
                    'created_at'    => now('Europe/Moscow'),
                    'category'      => $category['name'],
                    'category_id'   => $i
                ];
            }
        }

        $news = array_filter($news, function ($itemNews) use ($filters) {
            foreach ($filters as $filterName => $filterValue) {
                if ($filterValue && $itemNews[$filterName] != $filterValue) return false;
            }
            return true;
        });

        return $news;
    }

    public function getCategories(): array
    {
        return $this->categories;
    }

    public function generateCategories()
    {
        $categories = [];

        for($i=1; $i<6; $i++) {
            $name = $this->faker->word();
            $categories[$i] = [
                'name'    => $name,
                'id'      => $i
            ];
        }

        return $categories;
    }
}
