<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPlanet extends Model
{

	use HasFactory;

	protected $fillable = [
		"planet_id",
		"user_id",
		"age",
		"area",
	];
}
