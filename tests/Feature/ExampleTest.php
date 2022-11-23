<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;

class ExampleTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_basic_request()
    {
        $user = User::factory()->create();

        $this->actingAs($user, 'auth');

//        $response = $this->actingAs($user, 'web')->assertRedirect('/dashboard');
//        dd($response);
    }
}
