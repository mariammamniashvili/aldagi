<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System\Login;
use App\Http\Controllers\System\RegistrationController;
use App\Models\System\Registration;
class LoginController extends Controller
{
    public function system_login(Request $request)
    {
        $this->validate($request,[
            'system_name'=>'required',
            'password'=>'required'
        ]);
        
        $RegistrationController=new RegistrationController();
        if(!$RegistrationController->validateEmail($request->system_name)){
            return response()->json('Please enter with email format', 400);
        }
        
       
        $registered_system = Registration::wheresystem_name($request->system_name)->first();
        if($registered_system == null) {
            return response()->json('Incorect Email', 422);
        } else if($registered_system->password != $request->password) {
            return response()->json('Incorect Password', 422);
        }

        return response()->json($registered_system->id, 200);
    }
    

    
}