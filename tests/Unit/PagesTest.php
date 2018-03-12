<?php

namespace Tests\Unit;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PagesTest extends TestCase {
    
    private $user = null;
   
    private function getUser() {
        
        if ($this->user) return;
        
        $this->user = new User([
            'id' => 1,
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);
    }
    
    public function test_user_can_see_login_page() {
        $this->call('GET','/login')->assertSee('Login');
    }
    
    public function test_user_can_see_register_page() {
        $this->call('GET','/register')->assertSee('Register');
    }
    
    public function test_user_cant_see_dashboard_page() {
        $this->call('GET','/dashboard')->assertSee('/login');
    }
    
    public function test_user_cant_see_create_purchase_page() {
        $this->call('GET','/purchase/create')->assertSee('/login');
    }
     
    public function test_user_cant_see_edit_purchase_page() {
        $this->call('GET','/purchase/1/edit')->assertSee('/login');
    }
    
    public function test_user_can_see_dashboard() {
        $this->getUser();

        $this->actingAs($this->user)->call('GET','/dashboard')->assertSee('Hello '.$this->user->first_name.' '.$this->user->last_name);
    }
    
    public function test_user_can_see_create_purchase_page() {
        $this->getUser();
        
        $this->actingAs($this->user)->call('GET','/purchase/create')->assertSee('Create - Purchase Share');
    }
    
     public function test_user_can_see_edit_purchase_page() {
        $this->getUser();
        
        $this->actingAs($this->user)->call('GET','/purchase/1/edit')->assertSee('Edit - Purchase Share');
    }
    
    

}
