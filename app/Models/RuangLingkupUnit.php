<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangLingkupUnit extends Model
{
    use HasFactory;
    protected $table = 'ruang_lingkup_unit';

    protected $guarded = ['id'];
}
