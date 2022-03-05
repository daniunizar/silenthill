<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resident;
use App\Models\Gender;
class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residents = Resident::paginate(10);
        return view("resident.index", ["residents"=>$residents]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders = Gender::all();
        return view("resident.create", ["genders"=>$genders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Resident::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'birthdate' => $request->birthdate,
            'dni' => $request->dni,
            'gender_id'=>$request->gender_id
            ])){
            return redirect()->route('residents.create')->with('created', 'An error has ocurred');
        }
        return redirect()->route('residents.index')->with('created', 'New Resident has been registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resident = Resident::find($id);
        return view("resident.show", ["resident"=>$resident]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resident = Resident::find($id);
        $genders = Gender::all();
        return view("resident.edit", ["resident"=>$resident, "genders"=>$genders]);
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
        $resident = Resident::find($id);
        $input = $request->all();
        if(!$resident->fill($input)->save()){
            return redirect()->back()->withErrors(['msg' => 'The Message']);
        }
        return redirect()->route('residents.index')->with('updated', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Resident::destroy($id)){
            return redirect()->route("residents.index")->with('deleted', 'ko');
        }
        return redirect()->route("residents.index")->with('deleted', 'ok');
    }
}
