<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('admin.user.index');
    }

    public function fetchData()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function create(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = $request->password;
        $user->save();
        return response()->json(['message' => 'User created successfully'], 201);
    }

    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();
        return response()->json(['message' => 'User updated successfully'], 201);
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully'], 201);

    }
}
