<?php

namespace App\Models;

use App\Casts\PlanetCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Planet extends Model implements HasMedia
{
    use HasFactory;
	use InteractsWithMedia;


	protected $casts =[
		"water_id"=>PlanetCast::class,
		"care_situation_id"=>PlanetCast::class,
		"light_id"=>PlanetCast::class,
		"temperature_id"=>PlanetCast::class,
		"humidity_id"=>PlanetCast::class,
		"cleaning_id"=>PlanetCast::class,
		"poison_id"=>PlanetCast::class,
		"life_id"=>PlanetCast::class,
		"soil_id"=>PlanetCast::class,
	];

	public function SubCategory(  )
	{
		return $this->belongsTo(SubCategory::class);
    }
	public function registerMediaCollections(): void
	{

	}

	public function registerMediaConversions(Media $media = null): void
	{
		$this->addMediaConversion('thumb')
			->width(300)
			->height(300);
	}

	public function Water(  )
	{
		return $this->hasOne(Water::class);
	}
	public function Temperature(  )
	{
		return $this->hasOne(Temperature::class);
	}
	public function Light(  )
	{
		return $this->hasOne(Light::class);
	}
	public function Humidity(  )
	{
		return $this->hasOne(Humidity::class);
	}
	public function Poison(  )
	{
		return $this->hasOne(Poison::class);
	}
	public function Cleaning(  )
	{
		return $this->hasOne(Cleaning::class);
	}
	public function CareSituation(  )
	{
		return $this->hasOne(CareSituation::class);
	}
	public function Soil(  )
	{
		return $this->hasOne(Soil::class);
	}
}
