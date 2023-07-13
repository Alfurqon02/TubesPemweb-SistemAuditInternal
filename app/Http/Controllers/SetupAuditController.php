<?php

namespace App\Http\Controllers;

use App\Models\PeriodeAudit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SetupAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('setup-audit.index', [
            'periode' => PeriodeAudit::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('setup-audit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'no_sk_audit' => 'required|max:64',
            'file_sk' => 'required|file',
            'tanggal_sk' => 'required',
            'nama_ketua_spi' => 'required',
            'nip_ketua_spi' => 'required',
        ]);

        unset($validatedData['file_sk']);
        $periode = PeriodeAudit::create($validatedData);

        $path = $request->file('file_sk')->store('fileSK');
        $periode->update(['file_sk' => $path]);

        return redirect(route('setup-audit.index'))->with('success', 'Periode telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PeriodeAudit $periodeAudit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PeriodeAudit $setup_audit)
    {
        return view('setup-audit.edit', [
            'p' => $setup_audit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PeriodeAudit $setup_audit)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'no_sk_audit' => 'required|max:64',
            'file_sk' => 'nullable|file',
            'tanggal_sk' => 'required',
            'nama_ketua_spi' => 'required',
            'nip_ketua_spi' => 'required',
        ]);

        unset($validatedData['file_sk']);

        if ($request->file('file_sk')) {
            Storage::delete($setup_audit->file_sk);
            $path = $request->file('file_sk')->store('fileSK');
            $setup_audit->update(['file_sk' => $path]);
        }

        $setup_audit->update($validatedData);

        return redirect(route('setup-audit.index'))->with('success', 'Periode telah diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PeriodeAudit $setup_audit)
    {
        if ($setup_audit->file_sk) {
            Storage::delete($setup_audit->file_sk);
        }

        $setup_audit->delete();

        return redirect(route('setup-audit.index'))->with('success', 'Audit telah dihapus!');
    }

    /**
     * Download the specified resource.
     */
    public function download(PeriodeAudit $setup_audit)
    {
        $headers = "SK " . $setup_audit->nama_audit . ".pdf";
        return Storage::download($setup_audit->file_sk, $headers);
    }

    /**
     * Show the form for creating a new user.
     */
    public function addUser()
    {
        return view('setup-audit.addUser');
    }

    /**
     * Store a newly created user.
     */
    public function storeUser(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'roles' => 'required|array',
        ]);

        $user = User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        $user->roles()->sync($validatedData['roles']);

        return redirect()->route('admin.user.add')->with('success', 'User added successfully!');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function editUser(User $user)
    {
        return view('setup-audit.editUser', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function updateUser(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'roles' => 'required|array',
        ]);

        $user->update([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
        ]);

        if (!empty($validatedData['password'])) {
            $user->update(['password' => bcrypt($validatedData['password'])]);
        }

        $user->roles()->sync($validatedData['roles']);

        return redirect()->route('admin.user.add')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroyUser(User $user)
    {
        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.user.add')->with('success', 'User deleted successfully!');
    }

    public function add_user()
{
    $users = User::all(); // Fetch all users from the database
    return view('setup-audit.addUser', compact('users'));
}
}
