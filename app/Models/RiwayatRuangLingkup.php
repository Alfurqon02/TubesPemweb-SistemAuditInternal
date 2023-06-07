<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatRuangLingkup extends Model
{
    use HasFactory;
    protected $table = 'riwayat_ruang_lingkup';

    protected $guarded = ['id'];

    public function temuanAudit(){
        return $this->belongsToMany(TemuanAudit::class, 'id_temuan', 'id');
    }

    public function parameterStandarRuangLingkup(){
        return $this->belongsToMany(ParameterStandar::class, 'id_parameter', 'id');
    }


}
