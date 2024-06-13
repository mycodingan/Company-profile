<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function show()
    {
        $about = About::find(1); // Mengambil data dengan ID 1
        return view('about.index', compact('about'));
    }

    public function edit()
    {
        $about = About::find(1); // Mengambil data dengan ID 1
        return view('about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $about = About::find(1); // Mengambil data dengan ID 1
        $about->title = $request->title;
        $about->content = $request->content;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($about->image) {
                Storage::delete('public/' . $about->image);
            }

            $imagePath = $request->file('image')->store('about_images', 'public');
            $about->image = $imagePath;
        }

        $about->save();

        return redirect()->route('about.show')->with('success', 'Data updated successfully');
    }
}
