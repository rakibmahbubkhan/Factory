<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'description',
        'image1',
        'image2',
        'image3',
        'image4',
        'price',
        'category',
        'contact',
        'isActive',
        'created_by',
        'updated_by',
    ];
}
