<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase {
   
    public function test_user_can_see_login_page() {
        $this->call('GET','/login')->assertSee('Login');
    }

}
