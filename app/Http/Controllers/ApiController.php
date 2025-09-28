<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlaceToVisit;

class ApiController extends Controller
{
    public function getPlacesToVisit()
    {
        // get all places to visit
        $placetovisit=PlaceToVisit::all();
        return response()->json($placetovisit);
    }
}
