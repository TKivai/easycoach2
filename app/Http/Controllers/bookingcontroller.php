<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Collection;
use Auth;
use DB;
use App\Route;
use App\Station;
use App\Booking;
use App\Jobs\DeleteBookings;
use App\Mail\BookingMail;
use Mail;

class bookingcontroller extends Controller
{


    public function __construct(){

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stations = DB::table('stations')->select('id', 'name')->get();

        $start = DB::table('routes')->pluck('start_station_id');
        $details = collect();
        foreach ($start as $start) {
            $station = DB::table('stations')->select('id','name')->where('id', '=', $start)->get();
            $details->push($station->first());
            $details->unique(); 
        }
        $unique = $details->unique();

        return view('booking')->with('start_station',$unique);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax()){
            $start_station_id = $request->id;
            $subcategories = Route::where('start_station_id','=',$start_station_id)->get();
            $asa = collect();
            foreach ($subcategories as $station) {
                $fg = Station::where('id','=',$station->destination)->get();
                $multiplied = $fg->map(function ($item, $key) {
                    return $item;
                });

                $collection = collect(['name'=>$multiplied[0]->name, 'price'=>$station->fare,'id'=>$multiplied[0]->id]);
                $asa->push($collection);
            }
            return response()->json(array('result'=> $asa), 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'station1' => 'required',
            'stationid' => 'required',
            'price' => 'required',
            'start_date' => 'required',
            'user_id' => 'required',
        ]);

        $input = $request->all();
        

        $booking = new Booking;
        $booking->start_station_id = $input['station1'];
        $booking->final_station_id = $input['stationid'];
        $booking->price = $input['price'];
        $booking->date = $input['start_date'];
        $booking->user_id = $input['user_id'];
        $booking->save();
        
        $start_station = Station::find($input['station1'])->name;
        $final_station = Station::find($input['stationid'])->name;
        $price = $input['price'];
        $mesg = 'Make sure you have paid for the ticket within two days or it will be cancelled';
        

        $data = array(
            'from' => $start_station,
            'to' => $final_station,
            'price' => $price,
            'mesg' => $mesg
        );

        $email = Auth::user()->email;
        Mail::to($email)->send(new BookingMail($data));

        return redirect('/home')->with('booking','You have succesfully booked');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    // public function show()
    {
        return 'Success';
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('bookings')->where('id', '=', $id)->delete();
        return 'Success';
    }
}
