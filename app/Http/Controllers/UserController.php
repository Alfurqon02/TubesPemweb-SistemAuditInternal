<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function delete($id)
    {
        // Find the user by ID
        $user = User::find($id);

        if (!$user) {
            // User not found, handle the error accordingly
            return redirect()->back()->withErrors('User not found.');
        }

        // Perform the deletion
        $user->delete();

        // Redirect with success message
        return redirect()->back()->withSuccess('User deleted successfully.');
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'nip' => 'required|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:administrator,ketua_auditor,auditor,auditee,guests',
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->username = $request->username;
        $user->nip = $request->nip;
        $user->password = Hash::make($request->password);
        $user->save();

        $role = Role::where('name', $request->role)->first();

        if ($role) {
            $user->roles()->attach($role);
        }

        return redirect()->route('admin.user.add')->with('success', 'User created successfully.');
    }

    public function index()
    {
        $users = User::with('roles')->get();

        return view('admin.user.index', compact('users'));
    }
}