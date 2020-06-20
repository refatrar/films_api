<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FilmGenre extends Model
{
    public function gener()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
}
