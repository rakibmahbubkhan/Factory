<?php

namespace App\Http\Controllers\Admin;

use App\Models\Home\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('Admin.pages.home', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.pages.Sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sup_title' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'link' => 'required|string|max:255',
            'created_by' => 'nullable|integer',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Slider::create([
            'sup_title' => $request->sup_title,
            'title' => $request->title,
            'image' => $imageName,
            'link' => $request->link,
            'created_by' => $request->created_by,
        ]);

        return redirect()->route('Admin.pages.home')->with('success', 'Slider created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        return view('Admin.pages.Sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('Admin.pages.Sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'sup_title' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'link' => 'required|string|max:255',
            'updated_by' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $slider->image = $imageName;
        }

        $slider->update([
            'sup_title' => $request->sup_title,
            'title' => $request->title,
            'image' => $slider->image,
            'link' => $request->link,
            'updated_by' => $request->updated_by,
        ]);

        return redirect()->route('Admin.pages.home')->with('success', 'Slider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        return redirect()->route('Admin.pages.home')->with('success', 'Sliders deleted successfully.');
    }
}
