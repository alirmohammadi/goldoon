<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Planet extends Model implements HasMedia
{
    use HasFactory;
	use InteractsWithMedia;

	public function Category(  )
	{
		return $this->belongsTo(Category::class);
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
}
