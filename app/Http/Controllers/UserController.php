<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('register');
    }

    // Store user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'department' => 'required',
            'role' => 'required|in:admin,user',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'department' => $validated['department'],
            'role' => $validated['role'],
        ]);

        return redirect()->back()->with('success', 'User registered successfully!');
    }
    public function frontend(){
        $users = User::all();
        return view('user', compact ('users'));
    }
}
