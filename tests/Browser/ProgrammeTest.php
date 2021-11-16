<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProgrammeTest extends DuskTestCase
{
    /**
     * Test of a student's programme view.
     *
     * @return void
     */
    public function testProgrammeView()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', "54247@gmail.com")
                ->type('password', "dewdew")
                ->press('Login')

                ->visit('/programme');
            $browser->pause(1000)
                ->assertSee("Votre Programme")
                ->assertSee("WEBG2")
                ->assertSee("ECOG4")
                ->assertSee("MOBG5");
        });
    }
}