<?php

namespace App\Http\Controllers;

use App\Models\Admin\GuestLimit;
use App\Models\Qr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    public function create()
    {
        // Check the limit
        if (Auth::user()) {
            $count = Qr::where("user_id", Auth::user()->id)->count();
            return view('user.Qr.addQr', compact('count'));
        } else {
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
        if (Auth::user()) {
            Qr::create([
                "original_url" => $request->url,
                "qr" => $qrCode,
                "user_id" => Auth::user()->id
            ]);
        } else {
            $guestLimit  = GuestLimit::first();
            $count       = $guestLimit->limit;
            $guest       = session()->get('guestQr', 0);

            if($guest >= $count) {
                return redirect()->back()->with('error','لقد وصلت للحد المسموح');
            } else {
                Qr::create([
                    "original_url" => $request->url,
                    "qr" => $qrCode,
                    "user_id" => NULL
                ]);

                session()->put('guestQr', $guest + 1);
            }
        }

        return view('user.Qr.result', ['qrCode' => $qrCode]);
    }
}
