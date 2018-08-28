<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Holder;
use DB;

class AuditsController extends Controller
{
    //
    public function asset($id)
    {
    $audits = Asset::find($id)->audits;
        // $audits = $asset->audits()->with('holder')->get();

    $asset = Asset::find($id);

    return view('audits.asset')->with(['audits'=>$audits, 'asset'=>$asset]);
    }
}
