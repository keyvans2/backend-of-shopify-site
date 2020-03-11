<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Package;
use Illuminate\Http\Request;

class packagesController extends Controller
{
    public function index()
    {
        return response()->json([
            "data" => Package::all()
        ], 200);
    }

    public function store(Request $r)
    {

        $package = new Package([
            "title" => $r->title,
            "content" => implode("-", $r->cnt),
            "image" => implode("-", $r->image),
            "price" => $r->price,
        ]);
        $package->save();
        return response()->json([
            "data" => "success"
        ], 200);
    }

    public function destroy(Package $id)
    {
        $id->delete();
    }
}
