<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimAuditor extends Model
{
    use HasFactory;

    protected $table = 'tim_auditor';

    protected $guarded = ['id'];

    public function unitAudit(){
        return $this->belongsTo(UnitAudit::class, 'id_unit_audit', 'id');
    }
}
