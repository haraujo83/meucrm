<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 *
 */
class LeadsTest extends TestCase
{
    /**
     * @return void
     */
    public function testIndex(): void
    {
        $_SERVER['REQUEST_URI'] = env('APP_URL') . 'leads';

        $response = $this->get('/leads');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testCreate(): void
    {
        $_SERVER['REQUEST_URI'] = env('APP_URL') . 'leads/create';

        $response = $this->get('/leads/create');

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testNotfound(): void
    {
        $_SERVER['REQUEST_URI'] = env('APP_URL') . 'leads';

        $response = $this->get('/leads/page-not-exists');

        $response->assertStatus(404);
    }
}
