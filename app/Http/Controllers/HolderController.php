<?php

namespace App\Http\Controllers;

use App\Holder;
use App\Asset;
use App\Section;
use App\Dutystation;
use Illuminate\Http\Request;

class HolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //This function prevents users to bypass authentication
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $holders = Holder::orderBy('firstname', 'asc')->paginate(5);
        return view('holders.index')->with('holders', $holders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sections = Section::orderBy('sectionname', 'asc')->pluck('sectionname', 'id');
        $dutystations = Dutystation::orderBy('dutystationname', 'asc')->pluck('dutystationname','id');
        return view('holders.create')->with(['sections'=> $sections, 'dutystations' => $dutystations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'firstName' => 'required|min:2',
            'lastName' => 'required|min:2',
            'title' => 'required|min:5',
            'sections.0' => 'required',
            'dutystations.0' => 'required'
        ]);

        $holder = new Holder;
        $holder->firstName = $request->input('firstName');
        $holder->lastName = $request->input('lastName');
        $holder->title = $request->input('title');
        $holder->emailAddress = $request->input('email');
        $holder->section_id = $request->input('sections.0');
        $holder->dutystation_id = $request->input('dutystations.0');
        $holder->mobileNumber = $request->input('mobile');
        $holder->extension = $request->input('extension');
        $holder->callsign = $request->input('callsign');
        $holder->roomNumber = $request->input('roomnumber');
        $holder->save();

       /*  $input = Request::all();
        Holder::create($input); */

        return redirect('/holders')->with('success', 'holder created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Holder  $holder
     * @return \Illuminate\Http\Response
     */
    public function show(Holder $holder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Holder  $holder
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $holder = Holder::find($id);
        $sections = Section::orderBy('sectionname', 'asc')->pluck('sectionname', 'id');
        $dutystations = Dutystation::orderBy('dutystationname', 'asc')->pluck('dutystationname', 'id');
        return view('holders.edit')->with(['holder'=>$holder, 'sections'=>$sections, 'dutystations'=>$dutystations]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Holder  $holder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Holder $holder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Holder  $holder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Holder $holder)
    {
        //
    }
}
