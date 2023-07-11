<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\PeriodeAudit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimAuditor extends Model
{
    use HasFactory;

    protected $table = 'tim_auditor';

    protected $guarded = ['id'];

    public function periodeAudit(){
        return $this->belongsTo(PeriodeAudit::class,'unit_audit', 'id_periode_audit', 'id_tim_auditor');
    }

    public function unit(){
        return $this->belongsTo(Unit::class,'unit_audit', 'id_unit', 'id_tim_auditor');
    }
}
