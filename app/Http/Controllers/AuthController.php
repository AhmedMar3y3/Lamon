<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginUserRequest;
use App\Http\Requests\storeUserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HttpResponses;
    public function register(storeUserRequest $request){
        $validatedData = $request->validated();
        $user = User::create($validatedData);
        return $this->Success([
            'user' => $user,
            'token' => $user->createToken('Api token of '. $user->name)->plainTextToken
        ]);
    }
    public function login(loginUserRequest $request){
        $validatedData = $request->validated();
        if(!Auth::attempt($validatedData)){
            return $this->error('', 404, "Credintials do not match");
        }
        $user = User::where("email", $request->input('email'))->first();
        return $this->Success([
            'user' => $user,
            'token' => $user->createToken('Api token of '. $user->name)->plainTextToken
        ]
        );

    }
    public function logout(){
        Auth::user()->currentAccessToken()->delete();
        return $this->success([
            'message'=> Auth::user()->name .' ,you have successfully logged out and your token has been deleted'
        ]);

    }
}
