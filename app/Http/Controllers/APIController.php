<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class APIController extends Controller
{

    public function ApiUser(){
        $users = DB::select('select nip, display_name from users');
        // return json_encode($users);

        return json_encode($users);
    }

    public function ApiAudit(){
        $nip = Auth::user()->nip;
        $audit = DB::table('periode_audit')
                ->join('unit_audit', 'periode_audit.id', '=', 'unit_audit.id_periode_audit')
                ->join('tim_auditor', 'unit_audit.id_tim_auditor', '=', 'tim_auditor.id')
                ->join('user_tim', 'tim_auditor.id', '=', 'user_tim.id_tim')
                ->join('users', 'user_tim.id_user', '=', 'users.id')
                ->join('unit', 'unit_audit.id_unit', '=' ,'unit.id')
                ->where('tim_auditor.nip_ketua_tim', '=', $nip)
                ->select('periode_audit.nama as nama_audit',
                        'periode_audit.nama_ketua_spi as nama_ketua_spi',
                        'periode_audit.nip_ketua_spi as nip_ketua_spi',
                        'tim_auditor.nama as nama_tim',
                        'tim_auditor.nama_ketua_tim as nama_ketua_tim_auditor',
                        'tim_auditor.nip_ketua_tim as nip_ketua_tim_auditor',
                        'unit.nama as nama_unit',
                        'unit_audit.tanggal_audit as tanggal_audit',
                        'users.display_name as nama_auditor')
                ->get();

                return json_encode($audit);

    }
}
