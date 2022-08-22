<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminCategoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_categories_successful_page()
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertViewIs('admin.categories.index')
            ->assertStatus(200);
    }
}
