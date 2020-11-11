<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingPayment extends Model
{
    public $guarded = [];

    public function Booking()
    {
       return $this->belongsTo('App\Booking');
    }
}
