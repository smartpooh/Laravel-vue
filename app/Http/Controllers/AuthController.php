<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use JWTAuth;

class AuthController extends Controller
{
    public function signin(Request $request)
    {
        //return  bcrypt($request->password);
        if($token = JWTAuth::getToken()){
            try{
                JWTAuth::invalidate($token);
            }catch(\Exception $e){
            }
        }
        $credentials = $request->only('name', 'password');
        if (! $token = JWTAuth::attempt($credentials)) {
            return $this->error('用户名或密码错误');
        }
        return $this->success(['token' => $token]);
    }


}
