<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactModels extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'information',
        'status',
    ];
}
