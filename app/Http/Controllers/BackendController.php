<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\SharePurchase;

class BackendController extends Controller {
    
    public function dashboard() {
        $purchases = SharePurchase::where('user_id',  Auth::user()->id)->paginate(5);
        
        return view('backend.dashboard')
            ->withPurchases($purchases);
    }
    
}
