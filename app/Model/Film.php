<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function genres()
    {
       return $this->hasMany(FilmGenre::class);
    }

    public function getPhotoAttribute($value){
        return asset('films/'.$value);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country');
    }

}
