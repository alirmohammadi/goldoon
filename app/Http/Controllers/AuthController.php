<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Notifications\ForgetPassword;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
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

	public function ForgetPassword( Request $request)
	{
		$this->validate($request,["phone"=>"required"]);

		if(!empty(User::where("phone",$request->input("phone"))->value("id")))
		{
			$token=random_int(100000,1000000);
			DB::table("password_resets")->insert(["email"=>$request->input("phone"),"token"=>$token]);

			Notification::send('', new ForgetPassword(["token"=>$token,"phone"=>$request->input("phone")]));
		}
	}
}
