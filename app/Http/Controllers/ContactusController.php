<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactusController extends Controller
{
    public function index()
    {
        return view("user.pages.تواصل معنا");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name"=>"required|string|min:3",
            "email"=>"required|email",
            "subject"=>"required|string|min:3",
            "message"=>"required|string",
        ]);

        // Insert data
        ContactUs::create($data);

        return redirect()->back()->with("success","تم الارسال بنجاح سيتم التواصل معكم قريبا");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
