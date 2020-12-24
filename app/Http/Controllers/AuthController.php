<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{

	public function register( RegisterRequest $request)
	{
		$user=User::create([
			"phone"=>$request->input("phone"),
			"password"=>Hash::make($request->input("password")),
			"remember_token"=>Str::random(100)
		]);

		return $this->Response([
			"user"=>$user,
			"token"=>$user->remember_token
		]);
	}

	public function login( LoginRequest $request)
	{
		$user=User::where("phone",$request->input("phone"))->first();

		if(empty($user) or !Hash::check($request->input("password"),$user->password))
		{
			return $this->Response([
				"message"=>"phone or password incorrect"
			],false,401);
		}

		return $this->Response(["user"=>$user,"token"=>$user->remember_token]);
	}
}
