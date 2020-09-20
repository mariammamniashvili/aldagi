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
    public function system_login(Request $request)
    {
        $this->validate($request,[
            'system_name'=>'required',
            'password'=>'required'
        ]);
        
        if(!Validate::validateEmail($request->system_name)){
            return response()->json('Please enter corect email format', 400);
        }
       
        $registered_system = Registration::wheresystem_name($request->system_name)->first();
        if($registered_system == null) {
            return response()->json('Email Not Exist', 422);
        } else if($registered_system->password != $request->password) {
            return response()->json('Password Not Exist', 422);
        }

        return response()->json($registered_system->id, 200);
    }
}