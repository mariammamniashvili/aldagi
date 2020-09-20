<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Info\CarsInfoController;
use Illuminate\Http\Request;
use App\Models\CarInfo\GetCarManufacturers;
use App\Models\CarInfo\GetCarModels;

class CarsInfoController extends Controller
{
    public function manufactors()
    {
        $manufacturers = GetCarManufacturers::all()->toArray();
        return response()->json($manufacturers, 200);
    }
    
    public function models($id)
    {
        if(!is_int($id)) {
            return response()->json('Incorect data', 400);
        }
        $models = GetCarModels::wheremanufacturer_id($id)->get();
        return response()->json($models, 200);
    }    
}