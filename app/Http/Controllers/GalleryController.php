<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('gallery.index', compact('galleries'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'required|image',
            'caption' => 'nullable|max:255',
        ]);

        $path = $request->file('image')->store('gallery_images', 'public');

        $gallery = new Gallery([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'image' => $path,
            'caption' => $validatedData['caption'],
        ]);

        $gallery->save();

        return redirect()->route('gallery.index')->with('success', 'Gallery created successfully.');
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image',
            'caption' => 'nullable|max:255',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($gallery->image);
            $path = $request->file('image')->store('gallery_images', 'public');
            $gallery->image = $path;
        }

        $gallery->title = $validatedData['title'];
        $gallery->content = $validatedData['content'];
        $gallery->caption = $validatedData['caption'];
        $gallery->save();

        return redirect()->route('gallery.index')->with('success', 'Gallery updated successfully.');
    }

    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image);
        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Gallery deleted successfully.');
    }
}
