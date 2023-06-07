<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitAudit extends Model
{
    use HasFactory;

    protected $table = 'unit_audite';

    protected $guarded = ['id'];



    public function unit(){
        return $this->belongsTo(Unit::class, 'id_unit', 'id');
    }

    public function periodeAudit(){
        return $this->belongsTo(PeriodeAudit::class, 'id_periode', 'id');
    }

    public function auditor(){
        return $this->hasMany(User::class, 'id_auditor', 'id');
    }

    public function ruangLingkupUnit(){
        return $this->hasMany(User::class, 'id_unit', 'id');
    }
}
