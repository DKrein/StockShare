<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase {
   
    public function test_user_can_see_register_page() {
        $this->call('GET','/register')->assertSee('Register');
    }
    
    public function register_account() {
        
        
    }
}
