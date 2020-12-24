<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlanetController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post( 'register', [ AuthController::class, "Register" ] );
Route::post( 'login', [ AuthController::class, "Login" ] );
Route::get( "categories", [ PlanetController::class, "Categories" ] );
Route::get( "subcategories", [ PlanetController::class, "SubCategories" ] );
Route::get( "planets", [ PlanetController::class, "planets" ] );
Route::get( "search", [ PlanetController::class, "search" ] );