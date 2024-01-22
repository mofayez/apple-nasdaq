<?php

namespace Tests\Feature;

use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        Company::create([
            'name' => 'Apple Inc.',
            'symbol' => 'AAPL',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);


    }
}
