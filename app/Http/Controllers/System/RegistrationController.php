<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System\Registration;

class RegistrationController extends Controller
{
    public function system_registration(Request $request)
    {
        $this->validate($request,[
            'system_name'=>'required',
            'password'=>'required'
        ]);
        
        if(!self::validateEmail($request->system_name)){
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
    

    public function validateEmail($email)
    {
        return  preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email);
    }

    public function validatePhone($phone)
    {
        return ($phone[0] == '5' && strlen($phone) == 9 && preg_match("/^[0-9]*$/i", $phone));
    }

    public function validateId($user_id)
    {
        return (strlen($user_id) == 11 && preg_match("/^[0-9]*$/i", $user_id));
    }
}