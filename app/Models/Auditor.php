<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Extension\Table\Table;

class Auditor extends Model
{
    use HasFactory;

    protected $table = 'auditor';
    protected $guarded = ['id'];

    public function unitAudit(){
        return $this->belongsToMany(UnitAudit::class, 'id_unit', 'id');
    }
    public function user(){
        return $this->belongsToMany(User::class, 'id_user', 'id');
    }
}
