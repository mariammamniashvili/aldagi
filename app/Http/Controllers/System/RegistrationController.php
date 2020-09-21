<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System\Registrations;
use App\Helper\Validate;
use App\Helper\Repository;
class RegistrationController extends Controller
{
            /**
     * @OA\Post(
     ** path="/api/Company/Registration",
     *   tags={"Company/Registration"},
     *   summary="Company/Registration",
     *   operationId="Company/Registration",
     *
     *   @OA\Parameter(
     *      name="system_name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="password",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Response(
     *      response=201,
     *       description="Success",
     *      @OA\MediaType(
     *           mediaType="application/json",
     *      )
     *   ),
     *   @OA\Response(
     *      response=422,
     *       description="Email Or Password Not Exist"
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
    public function system_registration(Request $request)
    { 
        $this->validate($request, [
            'system_name'=>'required',
            'password'=>'required'
        ]);
        
        if(!Validate::CheckEmail($request->system_name)){
            return response()->json('Email Exist', 400);
        }

        if(!Validate::validateEmail($request->system_name)){
            return response()->json('Please enter correct email format', 400);
        }

        Repository::system_registration($request);

        return response()->json('Created', 201);
    }    
}