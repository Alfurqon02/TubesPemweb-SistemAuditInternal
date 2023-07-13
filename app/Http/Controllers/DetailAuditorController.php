<?php

namespace App\Http\Controllers;

use App\Models\PeriodeAudit;
use App\Models\TimAuditor;
use App\Models\UnitAudit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DetailAuditorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TimAuditor $input_auditor)
    {
        $auditor = DB::table('users')
        ->join('user_tim', 'users.id', '=', 'user_tim.id_user')
        ->join('tim_auditor', 'user_tim.id_tim', '=', 'tim_auditor.id')
        ->join('unit_audit', 'tim_auditor.id', '=', 'unit_audit.id_tim_auditor')
        ->join('periode_audit', 'unit_audit.id_periode_audit', '=', 'periode_audit.id')
        ->where('unit_audit.id', '=', $input_auditor->id)
        ->select('users.display_name as nama_auditor',
                'users.nip as nip_auditor',
                'users.email as email_auditor',
                'periode_audit.nama as nama_periode',
                'user_tim.id as id')
        ->get();
        // return $auditor;
        // return $input_auditor->id;
        return view ('input-auditor.show',[
            'auditor' => $auditor,
            'id'=> $input_auditor->id,
            'nama_periode' => $auditor[0]->nama_periode,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(TimAuditor $input_auditor)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TimAuditor $input_auditor, Request $request)
    {

        $validatedData = $request->validate([
            'nama' => 'required|string',
            'nip_auditor' => 'required|string',
        ]);
        $idUser = DB::table('users')->where('nip', '=', [$request->nip_auditor])->select('id')->get();
        $auditor = DB::insert('insert into user_tim (id_user, id_tim) values (?, ?)', [$idUser[0]->id, $input_auditor->id]);

        return redirect(route('input.index', $input_auditor))->with('success', 'Auditor Telah Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TimAuditor $input_auditor, TimAuditor $input)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TimAuditor $input_auditor, $input)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::delete('delete from user_tim where id = ?', [$input]);
        return redirect(route('input.index', ['input_auditor' => $input_auditor->id]))->with('success', 'Auditor Telah dihapus!');
    }
}
