<?php

namespace App\Http\Controllers;

use App\Exceptions\LoginFaildException;
use App\Http\Resources\LoginResource;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function login(Request $request)
    {
        $check= Auth::attempt([
            'name'=>$request->name,
            'password'=>$request->password
        ]);
        if ($check){
//            $token= Auth::user()->generateToken();
//            return response(['token'=>$token],200);

            $token= ['token'=>Auth::user()->generateToken()];
            return new LoginResource($token);
        }
        throw new LoginFaildException;

    }
    public function me(Request $request)
    {

//        return Auth::guard('api')->user();
//        dd(Auth::user()->toArray());
//        dd(Auth::user());

        $resource=new UserResource(Auth::user());
        return $resource;
    }

    public function register(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|alpha_dash|min:2',
            'email'=>'required|email|min:2|unique:users',
            'password'=>'required|alpha_dash|min:2',
        ]);
        $data['type']='admin';
        $data['password']=bcrypt($data['password']);
        $user=User::create($data);

        return new UserResource($user);
    }

    public function listUsers()
    {

//        return new UserResource(Auth::user());
        Auth::user()->can('update',User::class);
//        $this->authorize('update');
        return UserResource::collection(User::all());
    }
}
