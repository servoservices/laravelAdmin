<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlaceToVisit;
use App\Service;
use App\ServicesImage;

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
        $services=Service::all();
        return response()->json($services);
    }

    public function getServicesImages($category)
    {
        $services=ServicesImage::where('services_fk', $category)->get();
        return response()->json($services);
    }
}
