<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterStandar extends Model
{
    use HasFactory;
    protected $table = 'parameter_standar_ruang_lingkup';

    protected $guarded = ['id'];
}
