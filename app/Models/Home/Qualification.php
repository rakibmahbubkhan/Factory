<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'Tile1',
        'Tile_description1',
        'Tile2',
        'Tile_description2',
        'Tile3',
        'Tile_description3',
        'Tile4',
        'Tile_description4',
        'thumbnail',
        'video_link'
    ];

}
