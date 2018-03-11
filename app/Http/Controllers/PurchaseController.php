<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\SharePurchase;

class PurchaseController extends Controller {

    
    public function create() {
        return view('backend.purchase.create');            
    }
    
    public function store(PurchaseRequest $request) {
        
        $values = $request->all();
        $values['user_id'] = Auth::user()->id;
        
        return DB::transaction(function () use ($values) {
            $purchase = SharePurchase::class;
            $purchase = new $purchase();
            
            $purchase->fill($values);
            
            if ($purchase->save()) {
                return redirect()->route('dashboard')->withFlashSuccess('Stock purchased with success.');
            }
            return redirect()->route('dashboard')->withFlashDanger('Problem during the purchase creation.');
        });
    }
    
    public function edit(SharePurchase $purchase) {
        
        return view('backend.purchase.edit')->withPurchase($purchase);
    }
    
    public function update(SharePurchase $purchase, PurchaseRequest $request) {
        
        return DB::transaction(function () use ($purchase, $request) {
                
            $purchase->fill($request->all());

            if ($purchase->save()) {
                return redirect()->route('dashboard')->withFlashSuccess('Stock edited with success.');
            }
            return redirect()->route('dashboard')->withFlashDanger('Problem during the purchase edition.');
        });

    }

    public function delete(SharePurchase $purcahse, $id) {

        return DB::transaction(function () use ($id) {
            if (SharePurchase::find($id)->delete()) {
                return redirect()->route('dashboard')->withFlashSuccess('Stock purchased deleted with success.');
            }
            return redirect()->route('dashboard')->withFlashDanger('Problem during the purchase deletion.');
        });
    }
    
    
}
