<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Gender;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view("contact.index", ["contacts"=>$contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders = Gender::all();
        return view("contact.create", ["genders"=>$genders]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Contact::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'birthdate' => $request->birthdate,
            'dni' => $request->dni,
            'gender_id'=>$request->gender_id
            ])){
            return redirect()->route('contact.create')->with('created', 'An error has ocurred');
        }
        return redirect()->route('contact.index')->with('created', 'New Contact has been registered');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return view("contact.show", ["contact"=>$contact]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        $genders = Gender::all();
        return view("contact.edit", ["contact"=>$contact, "genders"=>$genders]);
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
        $contact = Contact::find($id);
        $input = $request->all();
        if(!$contact->fill($input)->save()){
            return redirect()->back()->withErrors(['msg' => 'The Message']);
        }
        return redirect()->route('contacts.index')->with('updated', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Contact::destroy($id)){
            return redirect()->route("contacts.index")->with('deleted', 'ko');
        }
        return redirect()->route("contacts.index")->with('deleted', 'ok');
    }
    /**
     * This function return the index view but only with contacts of a search process
     */
    public function searchResult(Request $request)
    {
        $searchParam = $request->resident_finder;
        $contacts = Contact::where('dni', 'like', '%'.$searchParam.'%')
        ->orWhere('name', 'like', '%'.$searchParam.'%')
        ->orWhere('lastname', 'like', '%'.$searchParam.'%')
        ->paginate(10);
        return view("contact.index", ["contacts"=>$contacts])->with('keyword', $searchParam);
    }
}
