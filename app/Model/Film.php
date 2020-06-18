<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function genres()
    {
       return $this->belongsTo(Genre::class);
    }

}
