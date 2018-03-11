<?php


namespace App\Http\Controllers;

class FrontendController extends Controller {
    public function index() {
        return view('index');
    }
    
    public function login() {
        return view('login');
    }
    
    public function register() {
        return view('register');
    }
    
    public function dashboard() {
        return view('backend.dashboard');
    }
}
