<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'unit';
    protected $guarded = ['id', 'parent_id', 'nama'];

    public function unitAudit(){
        return $this->hasMany(UnitAudit::class, 'id_unit', 'id');
    }

}
