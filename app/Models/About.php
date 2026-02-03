<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image1',
        'image2',
        'content',
        'experience',
        'features',
        'email',
        'phone',
    ];
}
