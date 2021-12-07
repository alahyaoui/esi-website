<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CavpTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAllDemandes()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', "secretary@gmail.com")
                ->type('password', "esipov")
                ->press('Login')
                ->visit('/cavp/alldemandes');
            $browser->pause(1000)
                ->assertSee("Toute les demandes:");
        });
    }

    public function testMesDemandes()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', "54247@gmail.com")
                ->type('password', "dewdew")
                ->press('Login')
                ->visit('/cavp/mydemandes');

            $browser->pause(1000)
                ->assertSee("Mes demandes:");
        });
    }
}
