<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceModels extends Model
{
    use HasFactory;
    protected $dates = [
        'startingDate',
        'endDate',
    ];
    protected $fillable = [
        'name',
        'title',
        'description',
        'logo',
        'startingDate',
        'endDate',
        'status'
    ];
}
