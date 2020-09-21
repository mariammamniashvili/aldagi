<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System\Login;
use App\Http\Controllers\System\RegistrationController;
use App\Models\System\Registrations;
use App\Helper\Validate;

class LoginController extends Controller
{
        /**
     * @OA\Post(
     ** path="/api/Login",
     *   tags={"Login"},
     *   summary="Login",
     *   operationId="login",
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
     *      response=200,
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
    public function system_login(Request $request)
    {
        $this->validate($request,[
            'system_name'=>'required',
            'password'=>'required'
        ]);
        
        if(!Validate::validateEmail($request->system_name)){
            return response()->json('Please enter corect email format', 400);
        }
       
        $registered_system = Registrations::wheresystem_name($request->system_name)->first();
        if($registered_system == null) {
            return response()->json('Email Not Exist', 422);
        } else if($registered_system->password != $request->password) {
            return response()->json('Password Not Exist', 422);
        }

        return response()->json($registered_system->id, 200);
    }
}