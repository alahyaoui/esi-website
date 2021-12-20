<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    /**
     * Checking the content of the users table
     *
     * @return void
     */
    public function test_users()
    {

        $this->assertDatabaseHas('users', [
            'email' => '54247@gmail.com',
            'email' => '54895@gmail.com',
            'email' => '12345@gmail.com',
            'email' => 'secretaire@gmail.com',
            'email' => 'admin@gmail.com'
        ]);
        //$this->assertDatabaseCount('course');
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_students()
    {

        $this->assertDatabaseHas('student', [
            'matricule' => 54247,
            'matricule' => 54895,
            'matricule' => 12345,
            'user_id' => 1,
            'user_id' => 2,
            'user_id' => 3,
        ]);
        //$this->assertDatabaseCount('course');
    }
}
