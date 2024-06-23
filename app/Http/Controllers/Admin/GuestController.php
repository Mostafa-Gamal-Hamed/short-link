<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\GuestLimit;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $guest = GuestLimit::first();
        return view("admin.guests.guests", compact("guest"));
    }

    public function update(Request $request, string $id)
    {
        // Find
        $limit = GuestLimit::findOrFail($id);

        // Validation
        $request->validate([
            "limit"=>"required|integer",
        ]);

        $limit->update(["limit"=>$request->limit]);

        return redirect()->back()->with('success','تم التحديث بنجاح');
    }
}
