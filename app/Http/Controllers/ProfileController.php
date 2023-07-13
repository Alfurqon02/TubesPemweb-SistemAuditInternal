<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display the authenticated user's profile.
     */
    public function show()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Return the view with the user's profile data
        return view('profile.show', compact('user'));
    }

    /**
     * Show the form for editing the authenticated user's profile.
     */
    public function edit()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Return the view with the user's profile data
        return view('profile', compact('user'));
    }

    /**
     * Update the authenticated user's profile.
     */
    public function update(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Validate the input fields, you can customize this validation based on your needs
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            // Add other fields to validate here
        ]);

        // Update the user's profile data
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        // Update other fields as needed
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}