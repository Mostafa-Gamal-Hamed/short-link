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
        $title = WebsiteName::orderby("id","desc")->get();
        return view("admin.site.site",compact("num","title"));
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate(["name"=>"required|string|min:3"]);

        WebsiteName::create(["name"=>$request->name]);

        return redirect()->back()->with('success','تم تسجيل الاسم بنجاح');
    }

    public function update(Request $request, string $id)
    {
        $title = WebsiteName::findOrFail($id);
        // Validation
        $request->validate(["name"=>"required|string|min:3"]);
        // Update
        $title->update(["name"=>$request->name]);

        return redirect()->back()->with('success','تم التغير بنجاح');
    }
}
