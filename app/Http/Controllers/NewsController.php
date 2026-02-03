<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        $company = Company::first();
        return view('Admin.pages.news.index', compact('news','company'));
    }

    public function create()
    {
        return view('Admin.pages.news.create');
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        $company = Company::first();

        return view('News.news_view', compact('news','company'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required',
            'link' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image1')) {
            $data['image1'] = $request->file('image1')->store('news_images', 'public');
        }
        if ($request->hasFile('image2')) {
            $data['image2'] = $request->file('image2')->store('news_images', 'public');
        }
        if ($request->hasFile('image3')) {
            $data['image3'] = $request->file('image3')->store('news_images', 'public');
        }

        News::create($data);

        return redirect()->route('news.index')->with('success', 'News created successfully.');
    }

    public function edit(News $news)
    {
        return view('Admin.pages.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required',
            'link' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image1')) {
            $data['image1'] = $request->file('image1')->store('news_images', 'public');
        }
        if ($request->hasFile('image2')) {
            $data['image2'] = $request->file('image2')->store('news_images', 'public');
        }
        if ($request->hasFile('image3')) {
            $data['image3'] = $request->file('image3')->store('news_images', 'public');
        }

        $news->update($data);

        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }

    public function destroy(News $news)
    {
        if ($news->image1) {
            \Storage::delete('public/' . $news->image1);
        }
        if ($news->image2) {
            \Storage::delete('public/' . $news->image2);
        }
        if ($news->image3) {
            \Storage::delete('public/' . $news->image3);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'News deleted successfully.');
    }
}
