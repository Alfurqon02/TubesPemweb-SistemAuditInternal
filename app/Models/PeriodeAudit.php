<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodeAudit extends Model
{
    use HasFactory;

    protected $table = 'periode_audit';

    protected $guarded = ['id'];

    public function unitAudit(){
        return $this->hasMany(UnitAudit::class,'id_periode_audit', 'id');
    }

    public function unit(){
        return $this->belongsToMany(Unit::class, 'unit_audit', 'id_periode_audit', 'id_unit');
    }
}
