<?php

namespace App\Nova;

use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Planet extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Planet::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

	public static function label() {
		return 'گیاهان';
	}
    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
	        Text::make("نام","name")->rules(["required"]),
	        Text::make("نام لاتین","latin_name")->rules(["required"]),
			BelongsTo::make("دسته بندی","SubCategory","App\Nova\SubCategory"),
	        Text::make("دوره تعویض خاک","soil_period")->rules(["required","integer"]),
	        Text::make("دوره آبیاری","water_period")->rules(["integer","required"]),
	        Images::make("عکس", 'main') // second parameter is the media collection name
	        ->conversionOnIndexView('thumb') // conversion used to display the image
	        ->rules('nullable', "max:3"),
	        Select::make("آبیاری","water_id")->options(
	        	$this->convertForSelect(\App\Models\Water::all())
	        )->displayUsingLabels(),
	        Select::make("تعویض خاک","soil_id")->options(
		        $this->convertForSelect(\App\Models\Soil::all())
	        )->displayUsingLabels(),
	        Select::make("شرایط نگهداری","care_situation_id")->options(
		        $this->convertForSelect(\App\Models\CareSituation::all())
	        )->displayUsingLabels(),
	        Select::make("تمیزکردن","cleaning_id")->options(
		        $this->convertForSelect(\App\Models\Cleaning::all())
	        )->displayUsingLabels(),
	        Select::make("نور","light_id")->options(
		        $this->convertForSelect(\App\Models\Light::all())
	        )->displayUsingLabels(),
	        Select::make("دما","temperature_id")->options(
		        $this->convertForSelect(\App\Models\Temperature::all())
	        )->displayUsingLabels(),
	        Select::make("رطوبت","humidity_id")->options(
		        $this->convertForSelect(\App\Models\Humidity::all())
	        )->displayUsingLabels(),
	        Select::make("سمی","poison_id")->options(
		        $this->convertForSelect(\App\Models\Poison::all())
	        )->displayUsingLabels(),
	        Select::make("طول عمر","life_id")->options(
		        $this->convertForSelect(\App\Models\Life::all())
	        )->displayUsingLabels(),
	        Text::make("ابعاد","size"),
	        Textarea::make("توضیحات","description"),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
