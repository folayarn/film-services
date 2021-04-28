<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    public $fillable = [
        'user_id',
        'payment_id',
        'order_id',
        'message',
        'channel',
        'amount',
        'status',
        'email',
        'reference_no',
        'film_id',
        'paid_at',
        'fees'

    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }


    
}
