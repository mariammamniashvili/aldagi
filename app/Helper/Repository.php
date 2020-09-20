<?php

namespace App\Helper;
use App\Models\User\Registration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Validate;
use App\Models\System\Registrations;

class Repository 
{

    public static function user_registration($request)
    {       
        
        if(!Validate::CheckUserId($request->user_id)){
            return response()->json('User Id Exist', 400);
        }
        
        if(!Validate::CheckRegistrationNumber($request->registration_number)){
            return response()->json('Car registration number exist', 400);
        }

        if(!Validate::validateId($request->user_id)){
            return response()->json('User Id must be 11 digital number', 400);
        }

        if(!Validate::validateEmail($request->email)){
            return response()->json('Please enter correct email format', 400);
        }
        
        if(!Validate::validateAge($request->birthday)){
            return response()->json('Must be more then 18', 400);
        }
        
        
        $user_registrations= new Registration;
        $user_registrations->system_id=$request->system_id;
        $user_registrations->first_name=$request->first_name;
        $user_registrations->last_name=$request->last_name;
        $user_registrations->user_id=$request->user_id;
        $user_registrations->phone=$request->phone;
        $user_registrations->email=$request->email;
        $user_registrations->birthday=$request->birthday;
        $user_registrations->manufacturer=$request->manufacturer;
        $user_registrations->model=$request->model;
        $user_registrations->issue_date=$request->issue_date;
        $user_registrations->registration_number=$request->registration_number;
        $user_registrations->photo=$request->photo;
        $user_registrations->status=$request->status;
        
        $res = $user_registrations->save();
        
        return true;
    } 


    public static function system_registration($request)
    { 
        if(!Validate::CheckEmail($request->system_name)){
            return response()->json('Email Exist', 400);
        }

        if(!Validate::validateEmail($request->system_name)){
            return response()->json('Please enter correct email format', 400);
        }
        
        $system_registrations= new Registrations;
        $system_registrations->system_name=$request->system_name;
        $system_registrations->password=$request->password;
        $res = $system_registrations->save();
        
        return response()->json('Created', 201);
    }

   
    
}