<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Firstcat;
use App\Http\Resources\catsResource as catsR;
use phpDocumentor\Reflection\Types\Collection;

class FirstCatController extends Controller
{
//    public function store(Request $r)
//    {
//        $first = new Firstcat();
//        $first->title = $r->title;
//        $first->save();
//    }

    public function index(Request $r)
    {
        $fetch = Firstcat::all();
        return response()->json([
            'data' => $fetch
        ]);
    }

//    public function destroy(firstcat $id)
//    {
//        $id->delete();
//    }
//
//    public function update(firstcat $id)
//    {
//        $id->update(['title' => 'mahdi']);
//
//    }
}
