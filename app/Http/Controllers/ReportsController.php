<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Holder;
use App\Assetmodel;
use App\Assettype;
use App\Po;
use DB;
use Carbon\Carbon;

class ReportsController extends Controller
{
    //
    public function ictstock()
    {
        $assets = Asset::with('Assettype')->where('holder_id', 2)->get();

        return view('reports.ictstock')->with('assets', $assets);
        // return view('test')->with('assets', $assets);
    }
}
