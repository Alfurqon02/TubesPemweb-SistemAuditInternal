<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AccountController extends Controller
{
    /**
     * Display the account information.
     */
    public function index()
    {
        $user = Auth::user();
        return view('account.index', compact('user'));
    }

    /**
     * Show the form for editing the account information.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('account.edit', compact('user'));
    }

    /**
     * Update the account information.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        
        // Validate the input fields, you can customize this validation based on your needs
        $validatedData = $request->validate([
            'email' => 'required|email',
            'nip' => 'required',
        ]);

        // Update the user's email and nip
        $user->email = $validatedData['email'];
        $user->nip = $validatedData['nip'];
        $user->save();

        return redirect()->route('account.index')->with('success', 'Account information has been updated.');
    }

    /**
     * Show the form for changing the password.
     */
    public function editPassword()
    {
        return view('account.change-password');
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request)
    {
        // Validate the input fields, you can customize this validation based on your needs
        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Verify the current password
        if (!Hash::check($validatedData['current_password'], $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Update the user's password
        $user->password = bcrypt($validatedData['new_password']);
        $user->save();

        return redirect()->route('account.index')->with('success', 'Password has been changed.');
    }

      public function updateEmail(Request $request)
    {
        $user = Auth::user();

        // Validate the input fields
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        // Update the user's email
        $user->email = $validatedData['email'];
        $user->save();

        return redirect()->route('account.index')->with('success', 'Email has been updated.');
    }
}