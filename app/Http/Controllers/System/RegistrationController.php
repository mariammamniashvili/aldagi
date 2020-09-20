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
        $this->validate($request, [
            'system_name'=>'required',
            'password'=>'required'
        ]);
        
        
        if(!Validate::validateEmail($request->system_name)){
            return response()->json('Please enter correct email format', 400);
        }
        
        $system_registrations= new Registration;
        $system_registrations->system_name=$request->system_name;
        $system_registrations->password=$request->password;
        $res = $system_registrations->save();
        
        return response()->json('Created', 201);
    }

    
}



