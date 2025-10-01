<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlaceToVisit;
use App\Service;

class ApiController extends Controller
{
    public function getPlacesToVisit()
    {
        // get all places to visit
        $placetovisit=PlaceToVisit::all();
        return response()->json($placetovisit);
    }


    public function getServices()
    {
        // get all services
        $services=Service::all();
        return response()->json($services);
    }
}
