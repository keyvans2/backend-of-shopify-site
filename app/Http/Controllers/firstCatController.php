<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Firstcat;
use App\Http\Resources\catsResource as catsR;
use phpDocumentor\Reflection\Types\Collection;

class FirstCatController extends Controller
{

    public function index(Request $r)
    {
        $fetch = Firstcat::all();
        return response()->json([
            'data' => $fetch
        ]);
    }

}
