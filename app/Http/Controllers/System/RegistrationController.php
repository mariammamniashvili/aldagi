<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\System\Registrations;
use App\Helper\Validate;
use App\Helper\Repository;
class RegistrationController extends Controller
{
    public function system_registration(Request $request)
    { 
        $this->validate($request, [
            'system_name'=>'required',
            'password'=>'required'
        ]);
        return response()->json(Repository::system_registration($request), 400);
        
        
    }

    
}



