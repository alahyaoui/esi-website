<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterTest extends DuskTestCase
{
    /**
     * Test of the registering page.
     *
     * @return void
     */
    public function testRegister()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertSee('E-Mail Address')
                ->assertSee('Password')
                ->assertSee('Confirm Password')
                ->assertSee('Register');
        });
    }
}