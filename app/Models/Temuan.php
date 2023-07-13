<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temuan extends Model
{
    use HasFactory;

    protected $table = 'temuan';

    protected $guarded = ['id'];

    public function feedback(){
        return $this->hasMany(Feedback::class, 'id_temuan', 'id');
    }

    public function unitAudit(){
        return $this->belongsTo(UnitAudit::class, 'id_unit_audit', 'id');
    }
}
