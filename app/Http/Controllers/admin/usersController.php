<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterValidate;

class usersController extends Controller
{
    public function count()
    {
        return $this->count();
    }

    public function index()
    {
        return User::all();
    }

    public function store(RegisterValidate $r)
    {
        $user = new User([
            "name" => $r->name,
            "username" => $r->username,
            "password" => bcrypt($r->password),
            "retype_password" => bcrypt($r->retype_password),
            "email" => $r->email,
            "phone" => $r->phone,
            "birthday" => $r->birthday,
        ]);

        $user->save();
    }

    public function destroy(User $id)
    {
        $id->delete();
    }

    public function edit(User $userId, Role $roleId)
    {
        $userId->role()->sync($roleId);
        $userId->save();
    }
}
