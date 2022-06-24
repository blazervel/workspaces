<?php

namespace Blazervel\PackageClassName\Tests\Feature;

use Blazervel\PackageClassName\Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
