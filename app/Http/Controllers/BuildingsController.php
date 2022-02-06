<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Building;


class BuildingsController extends Controller
{
    public function index()
    {
        $buildings = DB::select('select * from buildings');
        return view("buildings.index", ["buildings" => $buildings]);
        
    }
    public function edit($id)
    {
        $building = Building::find($id);
        return view("buildings.form", ["building" => $building]);
    }
    public function create()
    {
        return view("buildings.form");
    }
    public function create_post(Request $request)
    {

        
        $data = $request->validate([
            "name"    => 'required|unique:buildings',
            "capacity" => 'integer|required|min:1',

        ]);
        $building = new Building();
        $building->name = $data["name"];
        $building->capacity = $data["capacity"];
        $building->save();
        $buildings = DB::select('select * from buildings');
        return view("buildings.index", ["buildings" => $buildings]);
    }
    public function buildings_edit($id)
    {
        $building = Building::find($id);
        return view("buildings.form", ["building" => $building]);
    }

    public function buildings_post(Request $request,Building $building)
    {
        $data = $request->validate([
            "name"    => 'required',
            "capacity" => 'integer|required|min:1',

        ]);

        $building_edit = Building::find($building->id);
        $building_edit->name = $data["name"];
        $building_edit->capacity = $data["capacity"];
        $building_edit->save();
        $buildings = DB::select('select * from buildings');
        return view("buildings.index", ["buildings" => $buildings]);
    }

    public function buildings_delete($id)
    {
        $building = Building::find($id);
        $building->delete();
        $buildings = DB::select('select * from buildings');
        return view("buildings.index", ["buildings" => $buildings]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            "name"    => ["required","unique"],
            "capacity" => ["required","integer",">1"],
        ]);
    }
}