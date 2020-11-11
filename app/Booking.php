<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'id';
    //public $guarded = [];
    public $fillable = ['nume', 'prenume']; //opus lui guarded

    public function Destination()
    {
       return $this->hasMany('App\BookingDestination','booking_id','id');// forward id-key, local id-key 
    }

    public function Traveller()
    {
       return $this->hasMany('App\BookingTraveller','booking_id','id');
    }

    public function Payments()  //(istoria statusurilor de plata 1,2,3 sau 4) aici vom extrage toate statusurile care le are clientul
    {
       return $this->hasMany('App\BookingPayment','booking_id','id'); 
    }

    public function ActivePaymentStatus()
    {
       return $this->hasOne('App\BookingPayment','booking_id','id')->where('active', 1); 
    }
}
