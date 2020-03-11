<?php

namespace App\Http\Controllers;

use App\Phoneandaddress;
use Illuminate\Http\Request;

class phoneaddressController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Phoneandaddress::all()
        ], 200);
    }
}
