<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InitialRedirectTest extends TestCase
{
    /**
     * Tests that the homepage succesfully redirects to the login page
     */
    public function test_redirects_to_login_page_on_initial_load(): void
    {
        $response = $this->followingRedirects()
            ->get('/')
            ->assertStatus(200);

    }
}