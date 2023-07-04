<?php

namespace Tests\Feature\Http;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriesControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testSuccessNewsList(): void
    {
        $response = $this->get(route('categories.index'));

        $response->assertStatus(200);
    }

    public function testSuccessCreateForm(): void
    {
        $response = $this->get(route('categories.create'));

        $response->assertStatus(200);
    }

    public function testSuccessStoreResponse(): void
    {
        $postData =[
            'name' => fake()->userName(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'description' => fake()->text(maxNbChars: 100),
        ];

        $response = $this->post(route('categories.store'), $postData);

        $response->assertStatus(200);
        $response->assertJson($postData);
    }
}
