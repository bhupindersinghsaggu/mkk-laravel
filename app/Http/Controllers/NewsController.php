<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('dashboard.news.index', compact('news'));
    }

    public function create()
    {
        return view('dashboard.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'link' => 'nullable|url',
            'pdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = $request->only('title', 'description', 'link');

        if ($request->hasFile('pdf')) {
            $data['pdf'] = $request->file('pdf')->store('news', 'public');
        }

        News::create($data);

        return redirect()->route('news.index')
            ->with('success', 'News added successfully');
    }

    public function destroy(News $news)
    {
        if ($news->pdf) {
            Storage::disk('public')->delete($news->pdf);
        }

        $news->delete();

        return back()->with('success', 'News deleted');
    }
}
