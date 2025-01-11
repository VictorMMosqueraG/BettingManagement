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

        session()->flash('success', 'Usuario creado correctamente.');

        sleep(2);//Simulate a delay

        return redirect()->route('welcome');
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

        session()->flash('success', 'Usuario creado correctamente.');

        sleep(2);// Simulate a delay

        return redirect()->route('welcome');
    }

    //NOTE: method to show the form
    public function create(){
        return view('Users.create'); //Load the view
    }

    public function edit($id){
        $user = User::findOrFail($id); // Load the user by id
        return view('Users.update', compact('user')); // Load the view with the user
    }
}
