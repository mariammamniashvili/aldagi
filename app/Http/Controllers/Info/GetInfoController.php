<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Info\GetInfoController;
use Illuminate\Http\Request;
use App\Models\CarInfo\GetCarManufacturers;
use App\Models\CarInfo\GetCarModels;

class GetInfoController extends Controller
{
    public function manufactors(Request $request)
    {
        $manufacturers = GetCarManufacturers::all()->toArray();
        return response()->json($manufacturers, 200);
    }
    
    public function models(Request $request)
    {
        $models = GetCarModels::wheremanufacturer_id($request->manufacturer_id)->get();
        return response()->json($models, 200);
    }
    
}