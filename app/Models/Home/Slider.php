<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'sup_title',
        'title',
        'image',
        'link',
        'created_by',
        'updated_by',
    ];
}
