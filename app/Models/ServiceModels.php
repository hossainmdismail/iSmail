<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceModels extends Model
{
    use HasFactory;

    protected $fillable = [
        'offerTitle',
        'offerDescription',
        'status',
    ];
}
