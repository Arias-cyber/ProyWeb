<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Country;
class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        //dd($countries);
        return view('country.index', compact('countries')) ;
    }
}
