<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'experience',
        'members',
        'clients',
        'projects',
        'created_by',
        'updated_by',
    ];
}
