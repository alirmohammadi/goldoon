<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Planet;
use App\Models\SubCategory;
use App\Models\UserPlanet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanetController extends Controller
{

	public function Categories()
	{
		return $this->Response( [
			"Categories" => Category::with( "media" )->get(),
		] );
	}

	public function SubCategories( Request $request )
	{
		$this->validate( $request, [
			"category_id" => [ "required", "exists:categories,id" ],
		] );

		return $this->Response( [
			"SubCategories" => SubCategory::where( "category_id", $request->input( "category_id" ) )->get(),
		] );
	}

	public function Planets( Request $request )
	{
		$this->validate( $request, [
			"subcategory_id" => [ "required", "exists:sub_categories,id" ],
		] );

		return $this->Response( [
			"Planets" => Planet::where( "sub_category_id", $request->input( "subcategory_id" ) )->with( "media" )->get(),
		] );
	}

	public function Search( Request $request )
	{
		return $this->Response( [
			"Planets" => Planet::where( "name", "like", "%" . $request->input( "name" ) . "%" )->orWhere( "latin_name", "like", "%" . $request->input( "name" ) . "%" )->with( "media" )->get(),
		] );
	}

	public function AddUserPlanet( Request $request )
	{
		$this->validate( $request, [
			"id"   => [ "required", "exists:planets" ],
			"area" => [ "required", "string" ],
			"age"  => [ "required", "string" ],
		] );

		$user = Auth::user();

		return $user->UserPlanets()->save( new UserPlanet( [
			"planet_id" => $request->input( "id" ),
			"area"     => $request->input( "area" ),
			"age"      => $request->input( "age" ),
		] ) );


	}

	public function UserPlanets(  )
	{
		return Auth::user()->Planet()->with("media")->get();
	}
}
