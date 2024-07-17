<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\WebsiteName;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $num   =1;
        $title = WebsiteName::first();
        return view("admin.site.site",compact("num","title"));
    }

    public function store(Request $request)
    {
        // Validation
        $data = $request->validate([
            "name" =>"required|string|min:3",
            'key'  => 'required|string',
            'desc' => 'required|string',
        ]);

        WebsiteName::create($data);

        return redirect()->back()->with('success','تم تسجيل الاسم بنجاح');
    }

    public function update(Request $request, string $id)
    {
        $title = WebsiteName::findOrFail($id);
        // Validation
        $data = $request->validate([
            "name" =>"required|string|min:3",
            'key'  => 'nullable|string',
            'desc' => 'nullable|string',
        ]);
        // Update
        $title->update([
            "name"=>$request->name,
            "key"=>$request->key,
            "desc"=>$request->desc,
        ]);

        return redirect()->back()->with('success','تم التغير بنجاح');
    }
}
