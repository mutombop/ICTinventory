<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;

class ReturnController extends Controller
{
    //
    public function ictreturn(Request $request)
    {
        $asset = Asset::find($request->assetID);
        $asset->holder_id = 2;
        $asset->update();

        return redirect()->back()->with('success', 'asset updated');
    }

    public function adminreturn(Request $request)
    {
        $asset = Asset::find($request->assetID);
        $asset->holder_id = 3;
        $asset->update();

        return redirect()->back()->with('success', 'asset updated');
    }
}
