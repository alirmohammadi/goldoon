<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
	protected $appends =["media"];

	public function getMediaAttribute(  )
	{
		return [];
	}
	public function Planets(  )
	{
		return $this->hasMany(Planet::class);
    }

	public function Category(  )
	{
		return $this->belongsTo(Category::class);
	}
}
