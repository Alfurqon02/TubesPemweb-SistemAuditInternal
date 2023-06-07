<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangLingkupUnit extends Model
{
    use HasFactory;
    protected $table = 'ruang_lingkup_unit';

    protected $guarded = ['id'];

    public function unitAudit(){
        return $this->belongsTo(UnitAudit::class, 'id_unit', 'id');
    }

    public function temuanAudit(){
        return $this->hasMany(UnitAudit::class, 'id_ruang_lingkup', 'id');
    }
}
