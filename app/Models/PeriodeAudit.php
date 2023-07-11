<?php

namespace App\Models;

use App\Models\Unit;
use App\Models\TimAuditor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PeriodeAudit extends Model
{
    use HasFactory;

    protected $table = 'periode_audit';

    protected $guarded = ['id'];

    public function unit(){
        return $this->belongsToMany(Unit::class, 'unit_audit', 'id_periode_audit', 'id_unit');
    }

    public function timAuditor(){
        return $this->belongsToMany(TimAuditor::class, 'unit_audit', 'id_periode_audit', 'id_tim_auditor');
    }
}
