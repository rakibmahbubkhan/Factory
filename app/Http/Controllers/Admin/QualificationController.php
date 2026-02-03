<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home\Qualification;
use Illuminate\Http\Request;

class QualificationController extends Controller
{
    public function index()
    {
        $qualification = Qualification::first();
        return view('Admin.pages.qualification.index', compact('qualification'));
    }

    public function create()
    {
        $qualification = Qualification::first();
        if ($qualification) {
            return redirect()->route('qualification.edit', $qualification->id);
        }
        return view('Admin.pages.qualification.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'Tile1' => 'nullable|string|max:255',
            'Tile_description1' => 'nullable|string',
            'Tile2' => 'nullable|string|max:255',
            'Tile_description2' => 'nullable|string',
            'Tile3' => 'nullable|string|max:255',
            'Tile_description3' => 'nullable|string',
            'Tile4' => 'nullable|string|max:255',
            'Tile_description4' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'video_link' => 'nullable|string|max:255',
        ]);

        // Handle file uploads
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $validatedData['thumbnail'] = $path;
        }

        $qualification = Qualification::create($validatedData);

        if ($qualification) {
            return redirect()->route('Admin.pages.home')->with('success', 'Qualification created successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to save the qualification. Please try again.');
        }
    }




    public function edit(Qualification $qualification)
    {
        return view('Admin.pages.qualification.edit', compact('qualification'));
    }

    public function update(Request $request, Qualification $qualification)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'Tile1' => 'nullable|string|max:255',
            'Tile_description1' => 'nullable|string',
            'Tile2' => 'nullable|string|max:255',
            'Tile_description2' => 'nullable|string',
            'Tile3' => 'nullable|string|max:255',
            'Tile_description3' => 'nullable|string',
            'Tile4' => 'nullable|string|max:255',
            'Tile_description4' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'video_link' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('qualifications', 'public');
        }

        $qualification->update($data);

        return redirect()->route('Admin.pages.home')->with('success', 'Qualification updated successfully.');
    }
}
