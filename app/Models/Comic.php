<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'comic_slug',
        'summary',
        'author_id',
        'category_id',
        'image',
        'status',
        'is_complete',
        'view_count'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'comic_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'comic_id');
    }

    public function cats()
    {
        return $this->belongsToMany(Cats::class);
    }
}
