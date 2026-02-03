<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'logo',
        'address',
        'phone',
        'main_contact',
        'email',
        'twitter',
        'facebook',
        'linkedin',
        'youtube',
        'map',
        'opens_from',
        'ends_in',
        'opens_at',
        'ends_at',
        'copyright',
    ];

    protected $casts = [
        'phone' => 'array', // To cast phone numbers as an array
    ];
}
