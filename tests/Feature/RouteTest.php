<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    public function testRoutes()
    {
        $appURL = env('APP_URL');

        $urls = [
            '/',
            '/index',
            '/example',
            '/programme',
            '/pae',
            '/logout',
            '/home',
            '/studentregister',
        ];

        echo PHP_EOL;

        foreach ($urls as $url) {
            $response = $this->get($url);
            if ((int)$response->status() !== 200) {
                echo $appURL . $url . ' (FAILED) did not return a 200.';
                $this->assertTrue(false);
            } else {
                echo $appURL . $url . ' (success ?)';
                $this->assertTrue(true);
            }
            echo PHP_EOL;
        }
    }
}
