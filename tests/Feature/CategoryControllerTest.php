<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_categories_successful_page()
    {
        $response = $this->get(route('categories.index'));

        $response->assertViewIs('categories.index')
            ->assertStatus(200);
    }
}
