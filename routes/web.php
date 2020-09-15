<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("api")
    ->namespace("App\\Http\\Controllers\\Api")
    ->group(function (){
        Route::get("/countries", "Countries\\CountryController@index");
        Route::get("/countries/{id}/regions", "Countries\\CountryController@getRegions");
        Route::get("/regions/{id}/cities", "Countries\\CountryController@getCities");

});
