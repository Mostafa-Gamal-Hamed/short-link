<?php

namespace App\Http\Controllers;

use App\Models\Admin\LinkUsage;
use Illuminate\Http\Request;
use App\Models\Url;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UrlController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url'
        ]);

        // Check the limit
        $count = Url::where("user_id",Auth::user()->id)->count();
        if ($count >= Auth::user()->limitUrl) {
            return response()->json(['short_url'=>'لقد وصلت للحد المسموح']);
        }else{

        $user     = Auth::user()->id;
        $shortUrl = Str::random(6);

        $url = new Url();
        $url->original_url = $request->original_url;
        $url->short_url    = $shortUrl;
        $url->user_id      = $user;
        $url->save();

        return response()->json(['short_url' => url($shortUrl), 'original_url' => url($request->original_url)]);
        }
    }

    public function show($shortUrl)
    {
        $url = Url::where('short_url', $shortUrl)->firstOrFail();

        $result = $url->original_url;
        return view('user.الرئيسية');
    }
}
