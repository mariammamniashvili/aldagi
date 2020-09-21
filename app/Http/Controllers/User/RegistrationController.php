<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Registration;
use App\Helper\Validate;
use App\Helper\Repository;

class RegistrationController extends Controller
{
    /**
     * @OA\Post(
     ** path="/api/Insurance/Register",
     *   tags={"Insurance/Register"},
     *   summary="Insurance/Register",
     *   operationId="Insurance/Register",
     *
     *   @OA\Parameter(
     *      name="system_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="first_name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),     * 
     *   @OA\Parameter(
     *      name="last_name",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="user_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="phone",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="birthday",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string",
     *          format="date-time",
     *          format="date"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="manufacturer",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="model",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="issue_date",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string",
     *          format="date-time",
     *          format="date"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="registration_number",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ), 
     *   @OA\Parameter(
     *      name="email",
     *      in="query",
     *      required=false,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="photo",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *          type="string"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="status",
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
    public function user_registration(Request $request)
    {       
         $this->validate($request,[
            'system_id'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'user_id'=>'required',
            'phone'=>'required',
            'birthday'=>'required',
            'manufacturer'=>'required',
            'model'=>'required',
            'issue_date'=>'required',
            'registration_number'=>'required',
            'photo' => 'required',
            'status'=>'required'
        ]);
        
        if(!Validate::CheckUserId($request->user_id)){
            return response()->json('User Id Exist', 400);
        }
        
        if(!Validate::CheckRegistrationNumber($request->registration_number)){
            return response()->json('Car registration number exist', 400);
        }

        if(!Validate::validateId($request->user_id)){
            return response()->json('User Id must be 11 digital number', 400);
        }

        if(!empty($request->email) && !Validate::validateEmail($request->email)){
            return response()->json('Please enter correct email format', 400);
        }
        
        if(!Validate::validateAge($request->birthday)){
            return response()->json('Must be more then 18', 400);
        }

        Repository::user_registration($request);
        return response()->json(Repository::user_registration($request), 201);
    }
            /**
     * @OA\Post(
     ** path="/api/Insurance/List",
     *   tags={"Insurance/List"},
     *   summary="Insurance/List",
     *   operationId="Insurance/List",
     *
     *   @OA\Parameter(
     *      name="system_id",
     *      in="query",
     *      required=true,
     *      @OA\Schema(
     *           type="integer"
     *      )
     *   ),
     *   @OA\Parameter(
     *      name="page",
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
     *   )
     *)
     **/
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */

    public function users_list(Request $request)
    {
       $users = Registration::wheresystem_id($request->system_id)->paginate($request->page);
       return response()->json($users, 200);
    }   
}