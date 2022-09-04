<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackFormControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_feedbackform_send_return_json_page()
    {
        $name = fake()->name();
        $comments = fake()->paragraph();

        $data = [
            'name' => $name,
            'comments' => $comments
        ];

        $response = $this->post(route('feedback_form'), $data);

        $response->assertJson($data)
            ->assertStatus(200);
    }

    public function test_feedbackform_with_error_input_send_return_302()
    {
        $name = "";
        $comments = fake()->paragraph();

        $data = [
            'name' => $name,
            'comments' => $comments
        ];

        $response = $this->post(route('feedback_form'), $data);

        $response->assertStatus(302);
    }

    public function test_feedbackform_with_error_input_session_has_errors()
    {
        $name = "";
        $comments = "";

        $data = [
            'name' => $name,
            'comments' => $comments
        ];

        $response = $this->post(route('feedback_form'), $data);

        $response->assertSessionHasErrors(['name', 'comments']);
    }
}
