<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;


class ListCountryController extends Controller
{
    function listCountry(){
        $countryData = Http::get("https://date.nager.at/api/v3/AvailableCountries");
        // return view('countryList',['countries'=>$countryData]);
        $someArray = json_decode($countryData);
        $data = $this->paginate($someArray);
        return view('countryList', compact('data'));
    } 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    function countryDetails($code){
        $countryDetail = Http::get("https://date.nager.at/api/v3/CountryInfo/$code")->json();
        $holidayDetail = Http::get("https://date.nager.at/api/v3/NextPublicHolidays/$code")->json();
        return view('countryDetails',['details'=>$countryDetail,'borders'=>count($countryDetail['borders']),'holidays'=>$holidayDetail, 'totalHolidays'=>count($holidayDetail)]);
        // return $countryDetail['commonName'];
    }
}
