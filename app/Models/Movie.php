<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'title',
        'duration',
        'poster_url',
        'banner_url',
        'viewCount',
        'rating',
        'synopsis'
    ];

    public function genres(){
        return $this->belongsToMany(Genre::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
