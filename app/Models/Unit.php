<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'unit';

    protected $guarded = ['id'];

    public function unitAudit(){
        return $this->hasMany(UnitAudit::class, 'unit_id', 'id');
    }

    public function periodeAudit(){
        return $this->belongsToMany(PeriodeAudit::class, 'unit_audit', 'id_periode_audit', 'id_unit');
    }
}
