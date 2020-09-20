<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System\Registration;
use App\Helper\Validate;

class RegistrationController extends Controller
{
    public function system_registration(Request $request)
    {
        $this->validate($request,[
            'system_name'=>'required',
            'password'=>'required'
        ]);
        
        if(!Validate::validateEmail($request->system_name)){
            return response()->json('Please enter with email format', 400);
        }
        
        $system_registrations= new Registration;
        $system_registrations->system_name=$request->system_name;
        $system_registrations->password=$request->password;
        $res = $system_registrations->save();
        
        return response()->json('Created', 201);
    }
    

    public function system_login(Request $request)
    {
        $this->validate($request,[
            'system_name'=>'required',
            'password'=>'required'
        ]);
        
        if(!self::validateEmail($request->system_name)){
            return response()->json('Please enter with email format', 400);
        }
        
        $Login= new Registration;
        $registered_system = Registration::wheresystem_name($request->system_name)->first();
        if($registered_system == null) {
            return response()->json('Incorect Email', 422);
        } else if($registered_system->password != $request->password) {
            return response()->json('Incorect Password', 422);
        }

        return response()->json($registered_system->id, 200);
    }
    

   
    
}