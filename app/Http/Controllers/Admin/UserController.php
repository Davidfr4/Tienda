<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    $users = User::paginate(5):
    return view('admin.users.index', compact('users'));

    public function edit(User $user)
    {
        $roles=Role::all();

        return view('admin.users.edit', compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->syc($request->roles);
        return redirect()->route('users.edit', $user)->with("success", __("¡Asignado roles!"));
    }
}
