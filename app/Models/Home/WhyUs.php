<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'thumbnail',
        'video_link',
        'features',
        'content',
        'created_by',
        'updated_by',
    ];
}
