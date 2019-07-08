<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Booking;
use App\User;
use DB;
use App\Route;
use App\Station;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::id();

        $stations = DB::table('stations')->select('id', 'name')->get();

        // $starting = DB::table('bookings')->pluck('start_station_id');
        // $end = DB::table('bookings')->pluck('final_station_id');
        $details = collect();
        // foreach ($starting as $start) {
        //     $station = DB::table('stations')->select('name')->where('id', '=', $start)->get()->first();
        //     $station1 = collect($station);
        //     dd($station1);
        //     $start->concat();
        //     $details->push($station->first());
        //     $details->unique(); 
        // }
        $bookings = DB::table('bookings')->where('user_id', '=', $id)->get();
        foreach ($bookings as $booking) {

            $start_name = DB::table('stations')->select('name')->where('id', '=', $booking->start_station_id)->get()->first()->name;
            $end_name =  DB::table('stations')->select('name')->where('id', '=', $booking->final_station_id)->get()->first()->name;
            $booking1 = collect($booking);
            $booking1->put('start_name', $start_name);
            $booking1->put('end_name', $end_name);
            $details->push($booking1);
        }

        $user = User::where('id', '=', $id)->get()->first();

        return view('home')->with('bookings',$details)->with('user', $user);
    }
}
