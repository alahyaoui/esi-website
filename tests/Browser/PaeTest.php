<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PaeTest extends DuskTestCase
{
    /**
     * Test of the PAE page of a student.
     *
     * @return void
     */
    public function testPaePage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', "12345@gmail.com")
                ->type('password', "newstudent")
                ->press('Login')
                ->visit('/pae')
                ->assertSee('Votre PAE');
            $browser->pause(1000)
                ->assertSee('WEBG2');
        });
    }
}
