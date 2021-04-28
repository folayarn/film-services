<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['film_id','user_id','isPaid'];

    public function transaction(){
        return $this->hasOne(Transaction::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function film(){
        return $this->belongsTo(Film::class);
    }



}
