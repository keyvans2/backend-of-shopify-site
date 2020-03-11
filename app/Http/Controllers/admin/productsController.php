<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\Secondcat;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public function index()
    {
        return response()->json([
            "data" => Product::with('secondcat')->get()
        ], 200);
    }

    public function store(Request $r, Secondcat $id)
    {
        $pro = new Product([
            'title' => $r->title,
            'type' => $r->type,
            'color' => $r->color,
            'size' => $r->size,
            'price' => $r->price,
            'stock' => $r->stock,
            'image' => $r->image,
            'details' => $r->details,
            'star' => 0
        ]);
        $pro->secondcat_id = $id->id;
        $pro->save();
        return response()->json([
            "data" => "success"
        ], 200);

    }

    public function destroy(Product $id)
    {
        $id->delete();
        return response()->json([
            "data" => "success"
        ], 200);

    }


}
