<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PlaceToVisit;
use App\Service;
use App\ServicesImage;
use App\ServiceGallery;
use App\HotelImage;
use App\Client;

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

    public function getServiceGalleryByKF($id)
    {
        $services=ServiceGallery::where('services_fk', $id)->get();
        return response()->json($services);
    }
    public function getHotelImages($id)
    {
        $hotelimages=HotelImage::where('service_fk', $id)->first();
        return response()->json($hotelimages);
    }

    //create a function to create a new client
    public function createClient(Request $request)
    {
        $client=new Client();
        $client->name=$request->name;
        $client->last_name=$request->lastname;
        $client->phone_number=$request->phone;
        $client->email=$request->email;
        $client->password=$request->password;
        $client->verif_code=mt_rand(1000, 9999);
        $client->member=0;
        $client->is_verif=0;
        $client->save();

        return response()->json(['message' => $request->name]);
    }
    // create a function to to login
    public function login(Request $request)
    {
        $client=Client::where('email', $request->email)->first();
        if($client){
            if($client->password==$request->password){
                return response()->json( $client);
            }else{
                return response()->json(['message' => 'Password incorrect'], 401);
            }
        }else{
            return response()->json(['message' => 'Email incorrect'], 401);
        }
    }

    public function verifyClient(Request $request)
    {
        $client=Client::where('email', $request->email)->first();
        if($client){
            if($client->verif_code==$request->verif_code){
                $client->is_verif=1;
                $client->save();
                return response()->json(['message' => 'Verified']);
            }else{
                return response()->json(['message' => 'Code incorrect'], 401);
            }
        }else{
            return response()->json(['message' => 'Email incorrect'], 401);
        }
    }
}
