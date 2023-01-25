<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminDashboardModels extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'careerTitle',
        'careerDescription',
        'status',
    ];
}
