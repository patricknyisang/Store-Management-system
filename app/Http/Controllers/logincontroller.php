<?php

namespace App\Http\Controllers;

use App\Models\TBitems;
use Illuminate\Http\Request;
use App\Models\TBRegistration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

use Carbon\Carbon;

class LoginController extends Controller
{

    
 public function   registrationfunction(){

    return view('registration');
 }


 public function loginfunction(Request $request)
 {
     try{
 
         $username = $request->input('email');
         $password = $request->input('password');
         if ( isset($username) && isset($password)){
             $rec = TBRegistration::getWhere(["email" => $username],true);
             Log::info("rec: ".json_encode($rec));
 
             if (isset($rec->{'password'})){
                 if ($rec->{'password'} == ($password)) {
                  
                               return redirect()->intended('viewitem');
 
                 }
                 return response([
                     "error" => true,
                     "message" => "Invalid credentials try again!"
                 ]);
             }
             return response([
                 "error" => true,
                 "message" => "Credentials not found in our systems!"
             ]);
         }
         return response([
             "error" => true,
             "message" => "Enter required details!"
         ]);
     }catch (Exception $e){
         return response([
             "error" => true,
             "message" => "Error! ".$e->getMessage(),"Line".$e->getLine()
         ]);
     }
 }


 public function store_registration(Request $request){
    $dateTime = Carbon::now();

        $FirstName= $request->get('firstname');
        $lastName = $request->get('surname');
        $Email = $request->get('email');
        $Password = $request->get('password');

        $insertitem = [
            "first_name" => $FirstName,
            "surname" => $lastName,
            "email" => $Email, 
            "password" => $Password,
        
           ];

  
           TBRegistration::create($insertitem);

           return redirect(url('/'))->with ('message', 'created successfully');
        }


}
