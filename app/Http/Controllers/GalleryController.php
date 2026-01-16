<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    // Public gallery
    public function index()
    {
        $albums = Album::with('photos')->latest()->get();
        return view('gallery.index', compact('albums'));
    }

    // Admin gallery
    public function admin()
    {
        $albums = Album::withCount('photos')->latest()->paginate(10);
        return view('dashboard.gallery.index', compact('albums'));
    }

    // Store album + photos
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'images.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $album = Album::create([
            'title' => $request->title,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('gallery', 'public');

                $album->photos()->create([
                    'image' => $path,
                ]);
            }
        }

        return back()->with('success', 'Gallery album created successfully.');
    }
}
