<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\Registration;
use App\Helper\Validate;
class RegistartionController extends Controller
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
    
    public function users_list(Request $request)
    {
       $users = Registration::wheresystem_id($request->system_id)->paginate($request->page);;
       return response()->json($users, 200);
    }

   
}