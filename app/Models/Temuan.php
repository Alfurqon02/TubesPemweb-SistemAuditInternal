<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temuan extends Model
{
    use HasFactory;

    protected $table = 'temuan_audit';

    protected $guarded = ['id'];

    public function ruangLingkupUnit(){
        return $this->hasMany(RuangLingkupUnit::class, 'id_ruang_lingkup', 'id');
    }

    public function feedbackAudit(){
        return $this->hasMany(FeedbackAudit::class, 'id_temuan', 'id');
    }

    public function parameterStandar(){
        return $this->hasMany(RiwayatRuangLingkup::class, 'id_temuan', 'id');
    }
}
