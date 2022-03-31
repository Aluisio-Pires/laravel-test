<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_dashboard()
    {
        $this->actingAs(User::factory()->create());
        $response = $this->get('/dashboard');
        $response->assertStatus(200);
    }

    public function test_dashboard_userless()
    {
        $response = $this->get('/dashboard');
        $response->assertStatus(302);
    }
}
