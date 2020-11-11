<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingDestination extends Model
{
    public $guarded = [];

    public function Booking()
    {
       return $this->belongsTo('App\Booking');
    }
}
