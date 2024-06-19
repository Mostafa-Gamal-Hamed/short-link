<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\LinkUsage;
use App\Models\ContactUs;
use App\Models\Qr;
use App\Models\Url;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // User
    public function index()
    {
        $num   = 1;
        $users = User::where("role","user")->orderby("id","desc")->get();
        return view("admin.users.users",compact("num","users"));
    }

    public function show(string $id)
    {
        $user    = User::findOrFail($id);
        $links   = Url::where("user_id",$user->id)->count();
        $qrLinks = Qr::where("user_id",$user->id)->count();
        return view("admin.users.show",compact("user","links","qrLinks"));
    }

    public function edit(string $id)
    {
        $user    = User::findOrFail($id);
        $links   = Url::where("user_id",$user->id)->count();
        $qrLinks = Qr::where("user_id",$user->id)->count();
        return   view("admin.users.edit",compact("user","links","qrLinks"));
    }

    public function update(Request $request, string $id)
    {
        // Check if exist
        $user = User::findOrFail($id);

        // Validation
        $request->validate([
            'link' => 'required|integer',
            'qr' => 'required|integer',
        ]);

        // Insert data
        $user->update([
            "limitUrl"=>$request->link,
            "limitQr"=>$request->qr
        ]);

        return redirect()->route('showUser',"$id")->with('success','تم التعديل بنجاح');
    }

    public function destroy(string $id)
    {
        $user    = User::findOrFail($id);
        $links   = Url::where("user_id",$user->id)->get();
        $qrLinks = Qr::where("user_id",$user->id)->get();

        // Delete
        foreach ($links as $link) {
            $link->delete();
        }
        foreach ($qrLinks as $qrLink) {
            $qrLink->delete();
        }
        $user->delete();

        return redirect()->back()->with('success','تم الحذف بنجاح');
    }

    // Message
    public function messages()
    {
        $messages = ContactUs::all();
        return view("admin.message.messages",compact("messages"));
    }

    public function showMessage($id)
    {
        $message = ContactUs::findOrFail($id);
        return view("admin.message.show",compact("message"));
    }

    public function deleteMessage($id)
    {
        $message = ContactUs::findOrFail($id);
        $message->delete();

        return redirect()->route('messages')->with('success','تم حذف الرسالة بنجاح');
    }
}
