<?php

namespace App\Http\Controllers;

use App\Socialmedia;
use Illuminate\Http\Request;

class socialController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Socialmedia::all()
        ], 200);
    }
}
