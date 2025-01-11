<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller{

    //NOTE: Create new user
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'balance' => 'required|numeric',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'balance' => $request->balance,
        ]);

        return response()->json($user, 201);
    }

    //NOTE: Update user
    public function update(Request $request, $id){
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'balance' => 'required|numeric',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'balance' => $request->balance,
        ]);

        return response()->json($user);
    }

}
