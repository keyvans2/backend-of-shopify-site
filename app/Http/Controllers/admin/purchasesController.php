<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Purchase;
use Illuminate\Http\Request;

class purchasesController extends Controller
{
    public function index()
    {
        return response()->json([
            "data" => Purchase::all()
        ]);
    }

    public function subIndex(Purchase $id)
    {
        $user = $id->user;
        return response()->json([
            "user" => $user,
        ]);
    }

    public function edit(Request $r, Purchase $id)
    {
        $id->status = $r->status;
        $id->save();
    }
}
