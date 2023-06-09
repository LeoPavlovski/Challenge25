<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function loginUser(Request $request)
    {

        $validateUser = Validator::make($request->all(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ]);


        if($validateUser->fails()){
            return response()->json([
                'errors' => $validateUser->errors()
            ], 401);
        }


        $user = User::where('email', $request->email)->first();

        if (empty($user)) {
            return response()->json(["Wrong email"]);
        } else if (Hash::check($request->password, $user->password) && ($request->email === $user->email)) {
            $token = $user->createToken("API TOKEN")->plainTextToken;

            return response()->json(["token" => $token]);
        } else {
            return response()->json(["Wrong password"]);
        }
    }

    public function createUser(Request $request)
    {
        $validateUser =Validator::make($request->all(), [
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'name'=>'required'
        ]);

        if($validateUser->fails()){
            return response()->json([
                'errors'=>$validateUser->errors()
            ],401);
        }
        $user = User::create([
            "email"=>$request->email,
            "password"=>$request->password,
            "name"=>$request->name,
        ]);

        //Return the response
        return response()->json([
            'status' => true,
            'message' => 'User Created Successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ]);


    }
}
