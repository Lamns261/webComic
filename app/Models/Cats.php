<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cats extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'cat_slug',
    ];

    public function comics()
    {
        return $this->belongsToMany(Comic::class);
    }
}
