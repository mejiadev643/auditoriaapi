<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SanctumController extends Controller
{
    public function generateToken(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('token-name')->plainTextToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }

    public function createSession(Request $request)
    {

        $data = ['email'=>$request['email'],'password'=>$request['password']];
        $user = User::where('email',$data['email'])->first();//admin@admin.com

        if($user){

            if(Hash::check($data['password'],$user->password)){//revisa los hashes segun el nombre de los arrays

                //$token = $user->createToken("example");
                Auth::attempt($data);
                Auth::user();

                $response = "ok";

            }else{
                $response= "error, doesn't have a token valid";
            }

        }else{
            $response= "error, user doesn't exist";
        }

        return response()->json(["status"=>$response]);
    }
    public function logout(Request $request){
        Auth::logout();

        return response()->json(["status"=>"logout"]);
    }

}
