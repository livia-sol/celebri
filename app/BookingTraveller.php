<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingTraveller extends Model
{
    public $guarded = [];

    public function Booking()
    {
       return $this->belongsTo('App\Booking');
    }
}
