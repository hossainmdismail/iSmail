<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectModels extends Model
{
    use HasFactory;

    function rel_to_cat(){
        return $this->belongsTo(CategoryModels::class, 'categoryId');
    }

    protected $dates = [
        'startingDate',
        'endDate',
    ];

    protected $fillable =[
        'categoryId',
        'photo',
        'thumbnail',
        'title',
        'clientName',
        'startingDate',
        'endDate',
        'location',
        'website',
        'shortDescription',
        'longDescription',
        'status',
    ];
}
