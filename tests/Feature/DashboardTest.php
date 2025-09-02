<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_shows_counts(): void
    {
        $this->seed();

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee((string) 3); // seeded 3 films and 3 members
    }
}

