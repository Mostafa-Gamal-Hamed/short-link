<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdsController extends Controller
{
    public function index()
    {
        $ads = Ads::orderby('id', 'desc')->get();
        $num = 1;
        return view("admin.ads.ads", compact("ads", "num"));
    }
/*
Lorem ipsum dolor sit, amet consectetur adipisicing elit. Debitis, nobis.
Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nihil maiores corrupti, magnam eveniet eum rerum cumque consequatur perspiciatis eligendi? Consequuntur!
*/
    public function create()
    {
        return view("admin.ads.addAds");
    }

    public function store(Request $request)
    {
        if ($request->has("image")) {
            // Validation
            $data = $request->validate([
                "image" => "nullable|image|mimes:png,jpg,jpeg,gif",
                "link" => "required|url",
                "status" => "required|in:inactivate,activate",
                "showAds" => "required|in:الاعلى,يمين,الاسفل,يسار",
            ]);
            // Upload Image
            $data['image']  = $request->file('image')->store('ads', 'public');
            // Create Ads
            Ads::create($data);
        } else {
            // Validation
            $data = $request->validate([
                "link" => "required|url",
                "status" => "required|in:inactivate,activate",
                "showAds" => "required|in:الاعلى,يمين,الاسفل,يسار",
            ]);
            // Create Ads
            Ads::create([
                "title" => $request->title,
                "description" => $request->description,
                "link" => $request->link,
                "status" => $request->status,
                "showAds" => $request->showAds,
            ]);
        }

        return redirect()->route('ads')->with('success', 'تمت إضافة الإعلان بنجاح.');
    }

    public function edit(string $id)
    {
        $ads = Ads::findOrFail($id);
        return view('admin.ads.edit', compact('ads'));
    }

    public function update(Request $request, string $id)
    {
        $ads = Ads::findOrFail($id);

        if ($request->has('image')) {
            // Validation
            $data = $request->validate([
                "image" => "nullable|image|mimes:png,jpg,jpeg,gif",
                "link" => "required|url",
                "status" => "required|in:inactivate,activate",
                "showAds" => "required|in:الاعلى,يمين,الاسفل,يسار",
            ]);
            // Delete old image if exists
            if ($ads->image) {
                Storage::delete($ads->image);
            }
            // Upload Image
            $data['image']  = $request->file('image')->store('ads', 'public');

            // Update data
            $ads->update($data);
        } else {
            // Validation
            $data = $request->validate([
                "link" => "required|url",
                "status" => "required|in:inactivate,activate",
                "showAds" => "required|in:الاعلى,يمين,الاسفل,يسار",
            ]);

            // Update data
            $ads->update([
                "title" => $request->title,
                "description" => $request->description,
                "link" => $request->link,
                "status" => $request->status,
                "showAds" => $request->showAds
            ]);
        }


        return redirect()->back()->with('success', 'تم تحديث الإعلان بنجاح.');
    }

    public function destroy(string $id)
    {
        $ads = Ads::findOrFail($id);

        // Delete image if exists
        if ($ads->image) {
            Storage::delete($ads->image);
        }

        $ads->delete();

        return redirect()->back()->with('success', 'تم حذف الإعلان بنجاح.');
    }
}
