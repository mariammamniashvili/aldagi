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
      /**
     * @OA\Post(
     ** path="/api/Refund/Maximum",
        *   tags={"/api/Refund/Maximum"},
        *   summary="/api/Refund/Maximum",
        *   operationId="/api/Refund/Maximum",
        *
        *   @OA\Parameter(
        *      name="external_system_id",
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
        *   )
        *)
        **/
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */

    public function max_limit(Request $request)
    {
        $manufacturers = GetLimit::whereexternal_system_id($request->external_system_id)->get();
        return response()->json($manufacturers, 200);
    }
    /**
         * @OA\Post(
         ** path="/api/Price",
        *   tags={"Price"},
        *   summary="Price",
        *   operationId="Price",
        *
        *   @OA\Parameter(
        *      name="external_system_id",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *           type="integer"
        *      )
        *   ),
        *   @OA\Parameter(
        *      name="max_limit_id",
        *      in="query",
        *      required=true,
        *      @OA\Schema(
        *          type="integer"
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
        *      description="Bad Request"
        *   ),
        *   @OA\Response(
        *      response=404,
        *      description="not found"
        *   )
        *)
    **/
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function bonus(Request $request)
    {        
        $manufacturers = GetBonus::all();
       //$manufacturers = GetBonus::join('GetLimit', 'id', '=', 'max_id');
        return response()->json($manufacturers, 200);
    }
}