<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientsFeedbacks extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'profession',
        'image',
        'feedback',
        'isActive',
    ];
}
