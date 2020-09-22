<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Info\CarsInfoController;
use Illuminate\Http\Request;
use App\Models\CarInfo\GetCarManufacturers;
use App\Models\CarInfo\GetCarModels;

class CarsInfoController extends Controller
{
    /**
     * @OA\GET(
     ** path="/api/Car/Categories",
     *   tags={"Car/Categories"},
     *   summary="Car/Categories",
     *   operationId="Car/Categories",
     *
     *   @OA\Response(
     *      response=200,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   )
     *)
     **/
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function manufactors()
    {
        $manufacturers = GetCarManufacturers::all();
        return response()->json($manufacturers, 200);
    }

   /**
     * @OA\Get(
     ** path="/api/Car/Models",
        *   tags={"/api/Car/Models/{id}"},
        *   summary="/Api/Login",
        *   operationId="/Api/Login",
        *
        *   @OA\Parameter(
        *      name="id",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="integer"
        *      )
        *   ),
        *   @OA\Response(
        *      response=200,
        *       description="Success",
        *      @OA\MediaType(
        *           mediaType="application/json",
        *      )
        *   ),
        *   @OA\Response(
        *      response=400,
        *      description="Incorect data"
        *   )
        *)
        **/
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function models()
    {
        $models = GetCarModels::all();
        return response()->json($models, 200);
    }    
}