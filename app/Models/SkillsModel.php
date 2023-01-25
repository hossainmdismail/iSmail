<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillsModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'percentage',
        'status',
    ];
}
