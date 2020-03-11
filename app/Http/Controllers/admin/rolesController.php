<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Role;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class rolesController extends Controller
{
    public function index()
    {
        return response()->json([
            "data" => Role::all()
        ]);
    }

    public function store(Request $r)
    {
        $role = new Role([
            "title" => $r->role
        ]);
        $role->save();
    }

    public function destroy(Role $id)
    {
        $id->delete();
    }

    public function edit(Request $r, Role $id)
    {
        $id->title = $r->role;
        $id->save();
    }


}
