<?php

namespace App\Http\Controllers;

use App\Po;
use App\Section;
use Illuminate\Http\Request;

class PoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pos = Po::orderBy('poNumber', 'asc')->paginate(2);
        return view('pos.index')->with('pos', $pos);
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
        return view('pos.create')->with('sections', $sections);
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
            'ponumber' => 'required',
            'deliverydate' => 'required',
            'sections.0' => 'required'
        ]);

        $po = new Po;
        $po->poNumber = $request->input('ponumber');
        $po->deliveryDate = $request->input('deliverydate');
        $po->section_id = $request->input('sections.0');
        $po->save();

        return redirect('/pos')->with('success', 'PO created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Po  $po
     * @return \Illuminate\Http\Response
     */
    public function show(Po $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Po  $po
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $po = Po::find($id);
        $sections = Section::orderBy('sectionname', 'asc')->pluck('sectionname', 'id');
        return view('pos.edit')->with(['po' => $po, 'sections' => $sections]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Po  $po
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $po = Po::find($id);
        $po->poNumber = $request->input('ponumber');
        $po->deliveryDate = $request->input('deliverydate');
        $po->section_id = $request->input('sections.0');
        $po->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Po  $po
     * @return \Illuminate\Http\Response
     */
    public function destroy(Po $po)
    {
        //
    }
}
