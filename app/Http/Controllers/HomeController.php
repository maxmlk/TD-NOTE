<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke()
    {

        return view("index");
    }
    
    public function create()
    {
        $buildings = DB::select('select * from buildings');
        return view("reservation.form", ["buildings" => $buildings]);
    }
    public function create_post(Request $request)
    {
        $data = $request->validate([
            "date"    => 'required',
            "building_id" => 'required',
        ]);
        $reservation = new Reservation();
        $reservation->date = $data["date"];
        $reservation->user_id = Auth::user()->id;
        $reservation->building_id = $data["building_id"];
        $reservation->save();
        
        return $this->index();
    }
    public function index()
    {
        $reservation = Reservation::all();
        return view("reservation.index", ["reservation" => $reservation]);
    }
    public function reservation_delete($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        $reservation = DB::select('select * from reservations');
        return redirect("reservation_index");
    }
}
