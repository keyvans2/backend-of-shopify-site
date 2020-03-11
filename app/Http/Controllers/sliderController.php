<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class sliderController extends Controller
{
    public function new()
    {
        return response()->json([
            "data" => Product::all()->sortByDesc('created_at')
        ], 200);
    }

    public function Bestsellers()
    {
        return response()->json([
            "data" => Product::all()->sortByDesc('sell')
        ], 200);
    }
}
