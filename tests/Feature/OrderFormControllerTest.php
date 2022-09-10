<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderFormControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_orderform_send_return_json_page()
    {
        $name = fake()->name();
        $phone = fake()->phoneNumber();
        $email = fake()->email();
        $url = fake()->url();
        $data = fake()->paragraph();

        $data = [
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'url' => $url,
            'data' => $data
        ];

        $response = $this->post(route('order_form'), $data);

        $response->assertJson($data)
            ->assertStatus(200);
    }

    public function test_orderform_with_error_input_send_return_302()
    {
        $name = "";

        $data = [
            'name' => $name,
        ];

        $response = $this->post(route('order_form'), $data);

        $response->assertStatus(302);
    }
}
