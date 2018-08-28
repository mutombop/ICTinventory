<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Assettype;
use App\Assetmodel;
use App\Holder;
use App\Po;
use DB;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        //This function prevents users to bypass authentication
        public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        //
        $assets = Asset::orderBy('inventorytag', 'asc')->paginate(5);
      /*   $assets = Asset::with('status', 'product', 'users', 'teams')
	->find($id); */
        return view('assets.index')->with('assets', $assets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $assettypes = Assettype::orderBy('typename', 'asc')->pluck('typename', 'id');
        $assetmodels = Assetmodel::orderBy('modelname', 'asc')->pluck('modelname', 'id');
        $holders = Holder::all()->sortBy('firstname')->pluck('fullName','id');
        $pos = Po::orderBy('ponumber', 'asc')->pluck('ponumber', 'id');
        return view('assets.create')->with(['assettypes'=> $assettypes, 'assetmodels' => $assetmodels, 'holders' => $holders, 'pos' => $pos]);
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
        $asset = new Asset;
        $asset->inventorytag = $request->input('inventorytag');
        $asset->amr = $request->input('AMRnumber');
        $asset->assettype_id = $request->input('assettypes.0');
        $asset->assetmodel_id = $request->input('assetmodels.0');
        $asset->serialnumber = $request->input('serialnumber');
        $asset->holder_id = $request->input('holders.0');
        $asset->po_id = $request->input('pos.0');
        $asset->price = $request->input('price');
        $asset->comment = $request->input('comment');
        $asset->save();

        return redirect('/assets')->with('success', 'Asset created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $asset = Asset::find($id);
        $assettypes = Assettype::orderBy('typename', 'asc')->pluck('typename', 'id');
        $assetmodels = Assetmodel::orderBy('modelname', 'asc')->pluck('modelname', 'id');
        $holders = Holder::all()->sortBy('firstName')->pluck('fullName','id');
        $pos = Po::orderBy('ponumber', 'asc')->pluck('ponumber', 'id');
        return view('assets.edit')->with(['asset' => $asset, 'assettypes'=> $assettypes, 'assetmodels' => $assetmodels, 'holders' => $holders, 'pos' => $pos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $asset = Asset::find($id);
        $asset->inventorytag = $request->input('inventorytag');
        $asset->amr = $request->input('AMRnumber');
        $asset->assettype_id = $request->input('assettypes.0');
        $asset->assetmodel_id = $request->input('assetmodels.0');
        $asset->serialnumber = $request->input('serialnumber');
        $asset->holder_id = $request->input('holders.0');
        $asset->po_id = $request->input('pos.0');
        $asset->price = $request->input('price');
        $asset->comment = $request->input('comment');
        $asset->save();

        return redirect('/assets')->with('success', 'Asset updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        //
    }

        public function listperHolder($id)
    {
        //This is the old and ugly way to write query !!
/*         $assets = DB::table('assets')
            ->join('holders', 'holder_id', '=', 'holders.id')
            ->join('assetmodels', 'assetmodel_id', '=', 'assetmodels.id')
            ->select('assets.*', 'assetmodels.modelname')
            ->where('assets.holder_id', $id)
            ->orderBy('inventorytag', 'asc')
            ->get(); */

        $assets = Asset::where('holder_id', $id)->get();

        $holder = DB::table('holders')
            ->select('holders.*')
            ->where('id', $id)
            ->first();

        return view('assets.listperHolder')->with(['assets'=>$assets, 'holder'=>$holder]);
    }

    public function perpo($id)
    {
        $assets = Asset::where('po_id', $id)->get();

        $po = PO::find($id);

        return view('assets.perpo')->with(['assets'=>$assets, 'po'=>$po]);
    }
}
