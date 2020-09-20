<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Finance\FinanceController;
use Illuminate\Http\Request;
use App\Models\CarInfo\GetCarManufacturers;
use App\Models\CarInfo\GetCarModels;
use App\Models\FinanceInfo\GetLimit;
use App\Models\FinanceInfo\GetBonus;

class FinanceController extends Controller
{
   
    public function max_limit(Request $request)
    {
        $manufacturers = GetLimit::whereexternal_system_id($request->external_system_id)->get();
        return response()->json($manufacturers, 200);
    }

    public function bonus(Request $request)
    {        
        $manufacturers = GetBonus::where([['external_system_id',$request->external_system_id],['max_limit_id',$request->max_limit_id]])->get();
        return response()->json($manufacturers, 200);
    }
}