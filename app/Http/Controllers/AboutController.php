<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('Admin.pages.about.index', compact('about'));
    }

    public function create()
    {
        return view('Admin.pages.about.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'content' => 'required',
            'experience' => 'required|integer',
            'features' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
        ]);

        if ($request->hasFile('image1')) {
            $data['image1'] = $request->file('image1')->store('about_images', 'public');
        }

        if ($request->hasFile('image2')) {
            $data['image2'] = $request->file('image2')->store('about_images', 'public');
        }

        About::create($data);

        return redirect()->route('Admin.about')->with('success', 'About section created successfully.');
    }

    public function edit(About $about)
    {
        return view('Admin.pages.about.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'content' => 'required',
            'experience' => 'required|integer',
            'features' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
        ]);

        if ($request->hasFile('image1')) {
            $data['image1'] = $request->file('image1')->store('about_images', 'public');
        }

        if ($request->hasFile('image2')) {
            $data['image2'] = $request->file('image2')->store('about_images', 'public');
        }

        $about->update($data);

        return redirect()->route('Admin.about')->with('success', 'About section updated successfully.');
    }

    public function destroy(About $about)
    {
        if ($about->image1) {
            \Storage::delete('public/' . $about->image1);
        }

        if ($about->image2) {
            \Storage::delete('public/' . $about->image2);
        }

        $about->delete();

        return redirect()->route('Admin.about.index')->with('success', 'About section deleted successfully.');
    }
}
