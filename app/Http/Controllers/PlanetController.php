<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Planet;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class PlanetController extends Controller
{

	public function Categories(  )
	{
		return $this->Response([
			"Categories"=>Category::with("media")->get(),
		]);
    }

	public function SubCategories( Request $request)
	{
		$this->validate($request,[
			"category_id" => ["required","exists:category,id"]
		]);

		return $this->Response([
			"SubCategories"=>SubCategory::where("category_id",$request->input("category_id"))->with("media")->get()
		]);
	}
	public function Planets( Request $request)
	{
		$this->validate($request,[
			"subcategory_id" => ["required","exists:sub_category,id"]
		]);

		return $this->Response([
			"Planets"=>Planet::where("sub_category_id",$request->input("subcategory_id"))->with("media")->get()
		]);
	}

	public function Search( Request $request)
	{
		return $this->Response([
			"Planets"=>Planet::where("name","like","%".$request->input("name")."%")->orWhere("latin_name","like","%".$request->input("name")."%")->with("media")->get()
		]);
	}

	public function AddUserPlanet(  )
	{
		
	}
}
