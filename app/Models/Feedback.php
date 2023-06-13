<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback_audit';

    protected $guarded = ['id'];

    public function temuanAudit(){
        return $this->belongsTo(TemuanAudit::class, 'id_temuan', 'id');
    }
}
