<?php

namespace App\Http\Controllers;


use App\Secondcat;
//use http\Client\Response;
use Illuminate\Http\Request;
use App\Product;

use App\Firstcat;

class productsController extends Controller
{
    public function index(Firstcat $val)
    {
        $feAndCount = $val->secondcats()->withCount('products')->get();
        return response()->json([
            'data' => $feAndCount,
        ],200);
    }

    public function fetch(Firstcat $val, Secondcat $id = null)
    {
        if (is_null($id)) {

            $fetch = $val->secondcats;
            foreach ($fetch as $a) {
                return response()->json([
                    "data" => $a->products()->paginate(9)
                ], 200);
            }

        } else {
            return response()->json([
                "data" => $id->products()->paginate(9)
            ], 200);
        }


    }
}




