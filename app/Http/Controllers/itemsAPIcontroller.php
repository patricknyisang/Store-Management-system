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

class itemsAPIcontroller extends Controller
{

    public function getallitems()
{
    try {
         $gettheitems = TBitems::all();
        $productitems = [];

        foreach($gettheitems as $gettheitem) {
            $productitems[] = [
                "quantity" => $gettheitem->{'Quantity'},
                "items" => $gettheitem->{'item'},
      
            ];
        }


        // return response()->json([
        //     'data' => $products
        // ], 200);
         return response()->json($productitems, 200);

    } catch (\Exception $e) {
        return response()->json([
            'error' => true,
            'message' => $e->getMessage()
        ], 400);
    }
}

    
}