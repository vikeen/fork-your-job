<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class RegistrationTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     * @throws Throwable
     */
    public function test_user_can_create_new_account()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink("Register")
                ->type("name", "John Doe")
                ->type("email", "john.doe@gmail.com")
                ->type("password", "password")
                ->type("password_confirmation", "password")
                ->press("REGISTER")
                ->assertSee("You're logged in!");
        });

        $this->assertEquals(1, User::count());
    }
}
