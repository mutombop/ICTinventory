<?php

namespace App\Http\Controllers;
use App\Asset;
use App\Holder;
use PDF;

use Illuminate\Http\Request;

class PdfController extends Controller
{
    //
    public function index($id){

/* $holder = DB::table('holders')->find($id);
    ->select('holders.*')
    ->where('id', $id)
    ->first(); */

$assets = Asset::where('holder_id', $id)->get();

/* $assets = DB::table('assets')
    ->join('holders', 'holder_id', '=', 'holders.id')
    ->select('assets.*')
    ->where('assets.holder_id', $id)
    ->orderBy('inventoryTag', 'asc')
    ->get();

$model = DB::table('assetmodels')
    ->join('assets', 'model_id', '=', 'assetmodels.id')
    ->select('assetmodels.modelName')
    ->where('model_id', 'assetmodels.id')
    ->get(); */

$holder = Holder::find($id);
$pdf = PDF::loadView('pdf.receipt', ['holder' => $holder, 'assets' => $assets]);
return $pdf->stream('receipt.pdf');
}
}
