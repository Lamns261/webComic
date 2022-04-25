<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'comic_id',
        'chacrater_rating',
        'content_rating',
        'style_rating',
        'reader_name',
        'comment',
    ];

    public function comic()
    {
        return $this->belongsTo(Comic::class);
    }
}
