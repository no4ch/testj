<?php

namespace App\Http\Controllers\Api\Countries;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Region;
use App\Services\Countries\CountriesService;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::query()->orderBy('id', 'asc')->get();

        return response()->json($countries, 200);
    }

    public function getRegions($countryId)
    {
        $regions = CountriesService::make()->getRegionsByCountryId($countryId);

        return response()->json($regions, 200);
    }

    public function getCities($regionId)
    {
        $cities = CountriesService::make()->getCitiesByRegionId($regionId);

        return response()->json($cities, 200);
    }
}
