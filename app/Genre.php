<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $timestamps=false;
    protected $fillable=['name'];

    public function films(){

       return $this->belongsToMany(Film::class);
    }
}
