<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_news_successful_page()
    {
        $response = $this->get(route('news.index'));

        $response->assertStatus(200);
    }

    public function test_news_detail_successful_page()
    {
        $response = $this->get(route('news.show', ['id' => 1]));

        $response->assertViewIs('news.show')
            ->assertStatus(200);
    }

    public function test_news_detail_with_error_id_404()
    {
        $response = $this->get(route('news.show', ['id' => fake()->word()]));

        $response->assertNotFound();


    }
}
