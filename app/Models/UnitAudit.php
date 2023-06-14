<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitAudit extends Model
{
    use HasFactory;

    protected $table = 'unit_audit';

    protected $guarded = ['id'];

    public function temuan(){
        return $this->hasMany(Temuan::class, 'temuan_id');
    }

    public function timAuditor(){
        return $this->hasMany(TimAuditor::class, 'id_unit_audit', 'id');
    }

    public function periodeAudit(){
        return $this->belongsToMany(PeriodeAudit::class,'id_periode_audit', 'id');
    }

    public function unit(){
        return $this->belongsToMany(Unit::class, 'id_unit', 'id');
    }
}
