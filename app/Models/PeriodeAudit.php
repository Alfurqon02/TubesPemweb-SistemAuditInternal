<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodeAudit extends Model
{
    use HasFactory;
    protected  $table = 'periode_audit';

    protected $guarded = ['id'];

    public function unitAudit(){
        return $this->hasOne(UnitAudit::class, 'id_periode', 'id');
    }
}
