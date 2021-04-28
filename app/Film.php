<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable=['title','image','director_id','movieLength','releaseYear','price'];

    public function genres(){
        return $this->belongsToMany(Genre::class);
    }

    public function director(){
        return $this->belongsTo(Director::class);
    }
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
