<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Throwable;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     * @throws Throwable
     */
    public function test_user_can_login_to_their_account()
    {
        $user = User::factory()->create([
            'email' => 'john.doe@gmail.com'
        ]);

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink("Login")
                ->type("email", "john.doe@gmail.com")
                ->type("password", "password")
                ->press("LOGIN")
                ->assertSee("You're logged in!");
        });
    }
}
