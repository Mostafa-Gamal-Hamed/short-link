<?php

namespace App\Http\Controllers;

use App\Models\Qr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function create()
    {
        // Check the limit
        if(Auth::user()){
            $count = Qr::where("user_id",Auth::user()->id)->count();
            return view('user.Qr.addQr',compact('count'));
        }else{
            return view('user.Qr.addQr');
        }

    }

    public function generate(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        // Get Qr
        $qrCode = QrCode::size(200)->generate($request->url);

        // Insert data
        Qr::create([
            "original_url"=>$request->url,
            "qr"=>$qrCode,
            "user_id"=>Auth::user()->id
        ]);

        return view('user.Qr.result', ['qrCode' => $qrCode]);
    }
}
