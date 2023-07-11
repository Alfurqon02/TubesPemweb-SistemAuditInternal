<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('authentication.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'nip' => 'required|string|unique:users,nip',
            'display_name' => 'required|string',
            'username' => 'required|string|max:32|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'email' => $validatedData['email'],
            'nip' => $validatedData['nip'],
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Assign the "guests" role to the newly registered user
        $guestRole = Role::where('name', 'guests')->first();
        $user->roles()->attach($guestRole);

        return redirect()->route('login')->with('success', 'Registration successful');
    }
}