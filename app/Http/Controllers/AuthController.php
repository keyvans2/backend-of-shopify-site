<?php

namespace App\Http\Controllers;

use App\Firstcat;

use App\Http\Requests\RegisterValidate;
use App\Http\Resources\UserResource as UserR;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $r)
    {
        $this->validate($r, [
            'email' => 'required',
            'password' => 'required'
        ]);
        if (!$token = auth()->attempt($r->only(['email', 'password']))) {
            return response()->json([
                'errors' => [
                    'email' => ['can find anyone with these infos']
                ]
            ]);
        };
        return (new UserR($r->user()))->additional([
            'meta' => [
                'token' => $token
            ]
        ]);
    }

    public function register(RegisterValidate $r)
    {
//        $this->validate($r, [
//            'email' => 'required|email',
//            'name' => 'required|min:4',
//            'password' => 'required',
//            'retype_password' => 'required|same:password',
//            'username' => 'required',
//            'phone' => 'required',
//            'birthday' => 'required',
//            'image' => 'required'
//        ]);
//        echo $r;

//return $r->all();
        User::create([
            "name" => $r->name,
            "username" => $r->username,
            "password" => bcrypt($r->password),
            "retype_password" => $r->retype_password,
            "email" => $r->email,
            "birthday" => $r->birthday,
            "image" => $r->image,
            "phone" => $r->phone
        ]);
        if (!$token = auth()->attempt($r->only(['email', 'password']))) {
            return abort('401');
        }
        return (new UserR($r->user()))->additional([

            'meta' => [
                'token' => $token
            ]

        ]);
    }

    public function user(Request $r)
    {
        return new UserR($r->user());
    }

    public function logout()
    {
        auth()->logout();
    }
}
