<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitAudit extends Model
{
    use HasFactory;

    protected $table = 'unit_audit';

    protected $guarded = ['id'];
}
