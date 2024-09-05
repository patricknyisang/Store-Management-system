<?php

namespace App\Http\Controllers;

use App\Models\TBitems;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;

class itemscontroller extends Controller
{

    public function deleteitem($id){

        TBitems::where(['item_id' => $id], true)->delete();
    
        return redirect()->route('fetch')->with('success', 'Post updated successfully!');
    }
    //update function
    public function updateitem(Request $request,$id){
            $item_id= $request->get('item_id');
            $item = $request->get('item');
            $quantity = $request->get('quantity');
            $deficit = $request->get('deficit');
            $price = $request->get('price_per_item');
            $itempicture = $request->get('item picture');
    
       TBitems::where(['item_id' => $id])->update([
            "item_id" => $item_id,
                "item" => $item,
                "quantity" => $quantity, 
                "deficit" => $deficit,
                "price_per_item" => $price,
                "itempicture" => $itempicture, 
        ]);
        return redirect(url('viewitem'))->with ('message', 'Update successfully');
    }

public function getinsertview()
    {   

        return view('items');
 
    }
    public function store_item(Request $request){
        $dateTime = Carbon::now();

            $item_id= $request->get('item_id');
            $item = $request->get('item');
            $quantity = $request->get('quantity');
            $deficit = $request->get('deficit');
            $price = $request->get('price_per_item');
            $itempicture = $request->get('item picture');

//
            if ($item_id == null){
                return response(['error'=>true,'message'=>'Enter item id']);
            }

            if ($item == null){
                return response(['error'=>true,'message'=>'Enter item name']);
            }
            if ($quantity == null){
                return response(['error'=>true,'message'=>'Enter items quantity']);
            }
            if ($deficit == null){
                return response(['error'=>true,'message'=>'Enter items deficit in store']);
            }
            if ($price == null){
                return response(['error'=>true,'message'=>'Enter price_per_item']);
            }
           


 
            $insertitem = [
                "item_id" => $item_id,
                "item" => $item,
                "quantity" => $quantity, 
                "deficit" => $deficit,
                "price_per_item" => $price,
                "itempicture" => $itempicture,   
               ];

      
               TBitems::create($insertitem);

               return redirect(url('/'))->with ('message', 'created successfully');
            }


            
            public function getitems()
            {   
                $fetchitems = TBitems::all();
               
                return view('fetch',compact("fetchitems"));
         
            }
            protected function redirectTo() {
                // Custom logic to determine where to redirect
                return '/home';
            }
            
}