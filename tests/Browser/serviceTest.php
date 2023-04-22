<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class serviceTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit('http://localhost:8000/')
                ->pause(4000)
                ->click('#login')
//                ->visit('http://localhost:8000/login/')
                ->assertTitleContains('WaterAmerica')
                ->type('email','john.doe@wateramerica.com')
                ->type('password','john@1234')
                ->click('button[type="submit"]')
                ->assertPathIs('/customer/dashboard-customer');
            sleep(5);
        });
    }

    /** @test */
    public function testNewServiceRegistration(){

        $this->browse(function (Browser $browser) {
            $futureDate = now()->addDays(5);
            $browser
                ->assertSee('Request New Service')
                ->mouseover('#nw-service')
                ->click('#nw-service')
                ->click('#move_in_date')
                ->keys('#move_in_date','01','01','2023')
                ->pause(1000)
                ->typeSlowly('address_1', 'Dreamland')
                ->type('address_2', 'House Number 42')
                ->type('city', 'Chicago')
                ->typeSlowly('state','IL')
                ->typeSlowly('country','USA')
                ->typeSlowly('zipcode', '34423')
                ->pause(2000)
                ->click('button[type="submit"]')
                ->assertPathIs('/newservice/success')
                ->assertSee('Request Successfully Submitted!')
                ->pause(2000)
                ->mouseover('#dash-cust')
                ->click('#dash-cust')
                ->pause(2000)
                ->mouseover('#manage-req')
                ->click('#manage-req')
                ->pause(3000);
        });
    }
}
