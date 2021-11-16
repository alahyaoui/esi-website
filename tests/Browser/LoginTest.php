<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * Test of the login page.
     *
     * @return void
     */
    public function testLoginPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertSee('Login')
                ->assertSee('E-Mail Address')
                ->assertSee('Password')
                ->assertSee('Remember Me')
                ->assertSee('Forgot Your Password?');
        });
    }

    /**
     * Test of the views obtained on success.
     *
     * @return void
     */
    public function testLoginSucces()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', "54247@gmail.com")
                ->type('password', "dewdew")
                ->press('Login')
                ->assertPathIs('/home')
                ->assertSee('You are logged in!');
        });
    }
}