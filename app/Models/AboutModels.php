<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutModels extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'description',
        'link',
        'status',
    ];
}
