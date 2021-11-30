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

        $getUrls = [
            '/',
            '/index',
            '/example',
            //'/programme',
            //'/logout',
            '/studentregister',
        ];

        echo PHP_EOL;

        foreach ($getUrls as $url) {
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
