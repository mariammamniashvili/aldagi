<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function Test()
    {
        return response()->json([1,2,3,4,5], 200);
    }

    public function Ebee($id)
    {
        return response()->json($id, 200);
    }

    public function Gela(Request $request)
    {
        return response()->json($request, 201);
    }
}
