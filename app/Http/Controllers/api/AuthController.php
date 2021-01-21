<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    function login(Request $request)
    {

        $user= User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password) || $user->gToken) {
                return response([
                    'message' => 'These credentials do not match our records.'
                ]);
            }

             $token = $user->createToken('user-token')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token
            ];

             return response($response, 201);
    }
    function register(Request $request)
    {
        $name = $request->userName;
        $email = $request->email;
        $password = $request->password;
        $password_confirmation = $request->password_confirmation;
        $err = [];
        $user= User::where('email', $email)->first();
        // Name Validation
 if(strlen($name) <= 5 || strlen($name) >= 20){
            array_push($err,'nameLengthErr');
        }

 if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        array_push($err,'nameContainsErr');
       }
    //     Email Validation

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    array_push($err,'emailFormateErr');
}
if(DB::table('users')->where(['email'=>$email])->exists()){
    array_push($err,'emailExistErr');
}
if(DB::table('users')->where(['email'=>$email])->exists() && $user->gToken){
    array_push($err,'emailExistGoogleErr');
}
//  Password Validate
if(strlen($password) <= 6 ){
    array_push($err,'passwordLengthErr');
}
if($password !==  $password_confirmation){
    array_push($err,'passwordMatchErr');
}
if(!count($err)){
    User::create([
 'name' => $name,
 'email' => $email,
 'password' => Hash::make($password)
    ]);
    $user= User::where('email', $email)->first();
    $token = $user->createToken('user-token')->plainTextToken;
    $response = [
        'user' => $user,
        'token' => $token
    ];

     return response($response, 201);
}
else{

    return response(['err' => $err]);

}

    }
 public function googleLogin(Request $request) {
    $name = $request->name;
    $email = $request->email;
    $token = $request->gToken;
    $user= User::where('email', $request->email)->first();
    if (!$user) {
        User::create([
            'name' => $name,
            'email' => $email,
            'gToken' => $token
               ]);
               $user= User::where('email', $email)->first();
               $token = $user->createToken('user-token')->plainTextToken;
               $response = [
                   'user' => $user,
                   'token' => $token
               ];

                return response($response, 201);

    }
    else{
        $user= User::where(['email'=> $email,'gToken' => $token])->first();
        $token = $user->createToken('user-token')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];

         return response($response, 201);
    }

  }

  }
