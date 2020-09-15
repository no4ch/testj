<?php


namespace App\Services\Countries;


use App\Models\City;
use App\Models\Region;

class CountriesService
{
    public static function make(): CountriesService
    {
        return new static();
    }

    public function getRegionsByCountryId($countryId)
    {
        return Region::query()->where('country_id', $countryId)->get();
    }

    public function getCitiesByRegionId($regionId)
    {
        return City::query()->where('region_id', $regionId)->get();
    }
}
