<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Registration;
use App\Helper\Validate;
use App\Helper\Repository;

class RegistrationController extends Controller
{
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
            'status'=>'required'
        ]);
        return response()->json(Repository::user_registration($request), 400);
        
        
    }
    
    public function users_list(Request $request)
    {
       $users = Registration::wheresystem_id($request->system_id)->paginate($request->$page);
       return response()->json($users, 200);
    }   
}