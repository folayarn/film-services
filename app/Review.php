<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable=['body','film_id','user_id','created_at','updated_at'];

    public function film(){
        return $this->belongsTo(Film::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
