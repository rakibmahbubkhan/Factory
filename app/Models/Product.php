<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Faq;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'description',
        'key_features',
        'applications',
        'benefits',
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

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }
}
