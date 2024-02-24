<?php

namespace App\Http\Controllers;

use App\Models\PeriodeAudit;
use App\Models\TimAuditor;
use App\Models\UnitAudit;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailAuditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PeriodeAudit $setup_audit)
    {

        $audit = DB::table('unit_audit')
        ->join('periode_audit', 'periode_audit.id', '=', 'unit_audit.id_periode_audit')
        ->join('unit', 'unit_audit.id_unit', '=', 'unit.id')
        ->join('tim_auditor', 'unit_audit.id_tim_auditor','=','tim_auditor.id')
        ->where('periode_audit.id', '=', $setup_audit->id)
        ->select('unit.nama as nama_unit',
                'unit_audit.tanggal_audit as tanggal_audit',
                'tim_auditor.nama_ketua_tim as nama_ketua_tim',
                'tim_auditor.nip_ketua_tim as nip_ketua_tim',
                'tim_auditor.nama as nama_tim',
                'unit_audit.id as id' )
        ->get();
        $periode = PeriodeAudit::all()->where('id', '=', $setup_audit->id);
        return view('detaill-audit.index', [
            'periode' => $periode,
            'audit' => $audit,
            'id' => $setup_audit->id,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(PeriodeAudit $setup_audit)
    {
        return view('detaill-audit.create', [
            'id' => $setup_audit->id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PeriodeAudit $setup_audit, Request $request)
    {
        // dd($setup_audit);
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'nama_ketua_tim' => 'required|string',
            'nip_ketua_tim' => 'required|string',
            'nama_unit' => 'required',
            'tanggal_audit' => 'required|date',
        ]);

        $timAuditor = TimAuditor::create($validatedData);

        $nama_unit = $request->nama_unit;
        $tanggalAudit = $request->tanggal_audit;
        $idTim = $timAuditor->id;
        $idPeriode = $setup_audit->id;
        $saveUnit = DB::select('select id from unit where nama = ?', [$nama_unit]);
        $idUser = DB::select('select id from users where nip = ?', [$timAuditor->nip_ketua_tim]);
        // dd($idUser[0]);

        if (!empty($saveUnit)) {
            $idUnit = $saveUnit[0]->id;

            DB::insert('insert into unit_audit (tanggal_audit, id_periode_audit, id_unit, id_tim_auditor) values (?, ?, ?, ?)', [$tanggalAudit, $idPeriode, $idUnit, $idTim]);
        } else {
            // Handle the case when the "unit" with the given name does not exist.
        }

        DB::insert('insert into user_tim (id_user, id_tim) values (?, ?)', [$idUser[0]->id, $idTim]);
        DB::insert('insert into role_user (role_id, user_id, user_type) values (?, ?, ?)', [3, $idUser[0]->id, 'App\Models\User']);

        return redirect(route('detail.index', $setup_audit->id))->with('success', 'Unit Audit Telah ditambahkan!');
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
    public function edit(PeriodeAudit $setup_audit, UnitAudit $detail)
    {
        $audit = DB::table('unit_audit')
        ->join('periode_audit', 'periode_audit.id', '=', 'unit_audit.id_periode_audit')
        ->join('unit', 'unit_audit.id_unit', '=', 'unit.id')
        ->join('tim_auditor', 'unit_audit.id_tim_auditor','=','tim_auditor.id')
        ->where('periode_audit.id', '=', $setup_audit->id)
        ->where('unit_audit.id', '=', $detail->id)
        ->select('unit.nama as nama_unit',
                'unit_audit.tanggal_audit as tanggal_audit',
                'tim_auditor.nama_ketua_tim as nama_ketua_tim',
                'tim_auditor.nip_ketua_tim as nip_ketua_tim',
                'tim_auditor.nama as nama_tim',
                'unit_audit.id as id' )
        ->first();
        // $unitAudit = UnitAudit::with('')->where('id', '=', $setup_audit->id);
        return view('detaill-audit.edit', [
            'a' => $audit,
            'detail_id' => $detail->id,
            'setup_id' => $setup_audit->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PeriodeAudit $periodeAudit, UnitAudit $detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PeriodeAudit $setup_audit, UnitAudit $detail)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        UnitAudit::where('id','=', $detail->id)->delete();
        return redirect(route('detail.index', ['setup_audit' => $setup_audit->id, 'detail' => $detail->id]))->with('success', 'Audit Telah dihapus!');
    }
}
