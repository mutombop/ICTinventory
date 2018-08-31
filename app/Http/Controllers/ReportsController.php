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

    public function adminstock()
    {
        $assets = Asset::with('Assettype')->where('holder_id', 3)->get();

        return view('reports.adminstock')->with('assets', $assets);
    }

    public function assets3y()
    {
        $today = Carbon::now();
        /* $mydate = new Carbon('1973/12/25');
        $mydate = $onedate->toDateString();
        $today = $carbon->toDateString();
        $diff = $today->diffInDays($mydate);
        $assets = Asset::with(array('Po' => function($query)  {
            $query->where('now()->diffInDays($po->deliveryDate)','>','1000');
            }))->get(); */

        $assets = DB::table('assets')
            ->join('pos', 'po_id', '=', 'pos.id')
            ->select('assets.*', 'pos.ponumber')
            ->where((DATEDIFF(DAY, 'pos.deliveryDate', $today)), '>', 500)
            ->get();

        return view('test')->with('assets', $assets);
    }
}
