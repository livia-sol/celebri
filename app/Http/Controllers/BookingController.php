<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\User;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::get();
        //echo "<pre>";
        //dd($booking);
        
        return view('bookings.index', compact('bookings'));//['bookings' => $bookings] array
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Booking::updateOrCreate(
            ['locatie' => $request->location],
            ['nume' => 'Gigi']
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $all = $request->all();
        
        Booking::created([
            'nume'=> $request->name,
            'prenume'=>$request->surname,
            'cantitate'=> $request->qty,
            'email'=>$request->email,
            'user_id'=> Auth::user('id'),  //asemenea id-ului userului stocat in sesiune
            //putem salva ce utilizator creaza acest booking
            'group'=> 100,
            'scadenta_la_plata'=> date('Y-m-d', strtotime('+30 days'))
        ]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);
        return view('bookings.show',compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $booking = Booking::get($id);
        $booking->location = $request->location;
        $booking->price = $request->price; //pretul nu il acceptam ca venind din forma ci il luam din baza de date pt a nu fi manipulat
        $booking->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::get(); //select all
        $user = User::find(15); // aduce elementul cu primaryKey 15
        $users = User::where('nume', '=', 'Vasile')->get(); // = optional, alt operator e obligatoriu
        $users = User::where('nume', '>', 'Vasile')->get();
        $users = User::whereNume('Vasile')->get();
        $users = User::where('nume','=>','Vlad') //conditii AND
                    ->where('varsta','>',20) //AND
                    ->whereIn('nume',['vlad','mihai','nemek','livia','ionel']);
        $user = User::where('varsta','<',20)
                    ->orWhere('varsta','>',40)->paginate(10);
        $user = User::where('nume','LIKE','ie')
                    ->where(function($q){
                        $q->where('varsta','<',20)
                            //orWhere('varsta','>',40)
                        ->groupBy() //pt a grupa
                        ->orderBy(); //pt a ordona
                        });  //tip eloquent
                        
        //$bookinglaParis = Booking::matching();               

        //DB::('users')->  //tip data
        
        //Users nume, prenume, id, varsta

        $user::where('varsta','>',20)->get()->pluck('id','varsta');
        //pluck() -functie care extrage anumite campuri din db
        //de studiat

        //paginarea
        $user = User::paginate(10);
       // $user = new User;
        //$user = $user->where('nume','')->paginate->limit.....
        
        $users = collect(['nume'=>'vlad', 'varsta' => 20, 'qty' => 40],
                        ['nume'=>'maria', 'varsta' => 25, 'qty' => 20],
                        ['nume'=>'ioana', 'varsta' => 40, 'qty' => 15]
                    );
        $users->sum('qty'); //se aplica metode/functii matematice pt colectii
        $users->avg('qty'); //si functii de transformare toJson, toString
        $users->max('varsta'); //operatiuni pe seturi de date
    
    }
}

//view

//{{$user->links()}} //pt afisarea paginarii in blade