<?php

namespace App\Helper;
use Illuminate\Http\Request;
use App\Helper\Validate;
class Repository 
{
    public static function Registartion($request)
    {
       
       $request->validate($request,[
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
        
        if(!Validate::validateEmail($request->email)){
            return response()->json('Email validation failed', 400);
        }
        if(!Validate::validateAge($request->birthday)){
            return response()->json('Age', 400);
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
        $user_registrations->status=$request->status;
        $res = $user_registrations->save();
        
        return response()->json('Created', 201);
    }
     
    public static function validatePhone($phone)
    {
        return ($phone[0] == '5' && strlen($phone) == 9 && preg_match("/^[0-9]*$/i", $phone));
    }

    public static function validateId($user_id)
    {
        return (strlen($user_id) == 11 && preg_match("/^[0-9]*$/i", $user_id));
    }

    public static function validateAge($birthDate)
    {
        $birthDate = explode("/", $birthDate);
        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
        ? ((date("Y") - $birthDate[2]) - 1)
        : (date("Y") - $birthDate[2]));
        //return ($birthDate);
        return ($age > 18 || $age == 18);
    }
}