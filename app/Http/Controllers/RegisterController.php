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

    $validatedData['id_unit'] = mt_rand(1, 68); // Assign the random value

    $user = User::create([
        'email' => $validatedData['email'],
        'nip' => $validatedData['nip'],
        'display_name' => $validatedData['display_name'],
        'id_unit' => $validatedData['id_unit'],
        'username' => $validatedData['username'],
        'password' => Hash::make($validatedData['password']),
    ]);

    // Assign the "auditor" role to the newly registered user
    $guestRole = Role::where('name', 'auditor')->first();
    $user->roles()->attach($guestRole);

    return redirect()->route('login')->with('success', 'Registration successful');
}

}