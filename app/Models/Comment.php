<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId', 'movieId', 'rating', 'description'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'userId');
    }

    public function movie() {
        return $this->belongsTo('App\Models\Movie', 'movieId');
    }
}
