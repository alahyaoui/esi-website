<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class InscriptionTest extends DuskTestCase
{
    /**
     * Test of the view allowing a user to register to ESI.
     *
     * @return void
     */
    public function testInscriptionVue()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->type('email', "54247@gmail.com")
                ->type('password', "dewdew")
                ->press('Login')
                ->visit('/studentregister')
                ->assertSee('Prénom')
                ->assertSee('Nom')
                ->assertSee('Bloc')
                ->assertSee('Section')
                ->assertSee('CESS')
                ->assertSee('Carte d\'identité');
        });
    }
}