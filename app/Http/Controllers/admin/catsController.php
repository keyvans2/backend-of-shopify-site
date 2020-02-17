<?php

namespace App\Http\Controllers\admin;

use App\Firstcat;
use App\Http\Controllers\Controller;
use App\Secondcat;
use Illuminate\Http\Request;

class catsController extends Controller
{
    public function firstIndex()
    {
        return Firstcat::all();
    }

    public function firstCatStore(Request $r)
    {
        $first = new Firstcat([
            'title' => $r->title
        ]);
        $first->save();
        return response()->json([
            "data" => "success"
        ], 200);
    }

    public function secondCatStore(Request $r, Firstcat $id)
    {
        $second = new Secondcat([
            'title' => $r->title
        ]);
        $second->firstcat_id = $id->id;
        $second->save();
        return response()->json([
            "data" => "success"
        ], 200);

    }

    public function firstCatDel(Firstcat $id)
    {
        $id->delete();
        return response()->json([
            "data" => "success"
        ], 200);

    }

    public function secondCatDel(Secondcat $id)
    {
        $id->delete();
        return response()->json([
            "data" => "success"
        ], 200);
    }

    public function showAllCats()
    {
        return response()->json([
            "data" => Firstcat::with('secondcats')->get()
        ], 200);
      
    }
}
