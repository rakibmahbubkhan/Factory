<?php

namespace App\Http\Controllers\Admin;

use App\Models\Home\HomeAbout;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeaboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homeabout = HomeAbout::first(); // Fetch the single record
        return view('Admin.pages.Homeabouts.index', compact('homeabout'));
    }

    public function create()
    {
        $homeabout = HomeAbout::first();
        if ($homeabout) {
            return redirect()->route('homeabouts.edit', $homeabout->id)->with('info', 'Only one Homeabout section can exist. You can edit the existing one.');
        }

        return view('Admin.pages.Homeabouts.create');
    }

    public function store(Request $request)
    {
        $homeabout = HomeAbout::first();
        if ($homeabout) {
            return redirect()->route('homeabouts.edit', $homeabout->id)->with('info', 'Only one Homeabout section can exist. You can edit the existing one.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'content' => 'required|string',
            'experience' => 'required|integer',
            'features' => 'required|string',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }
        $image2Name = null;
        if ($request->hasFile('image2')) {
            $image2Name = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $image2Name);
        }

        HomeAbout::create([
            'title' => $request->title,
            'image' => $imageName,
            'image2' => $image2Name,
            'content' => $request->content,
            'experience' => $request->experience,
            'features' => $request->features,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('Admin.pages.home')->with('success', 'About created successfully.');
    }

    public function edit(HomeAbout $homeabout)
    {
        return view('Admin.pages.Homeabouts.edit', compact('homeabout'));
    }

    public function update(Request $request, HomeAbout $homeabout)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'content' => 'required|string',
            'experience' => 'required|integer',
            'features' => 'required|string',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:15',
        ]);

        if ($request->hasFile('image1')) {
            $imageName1 = time() . '_1.' . $request->image1->extension();
            $request->image1->move(public_path('images'), $imageName1);
            $homeabout->image1 = $imageName1;
        }

        if ($request->hasFile('image2')) {
            $imageName2 = time() . '_2.' . $request->image2->extension();
            $request->image2->move(public_path('images'), $imageName2);
            $homeabout->image2 = $imageName2;
        }

        $homeabout->update([
            'title' => $request->title,
            'image1' => $homeabout->image1,
            'image2' => $homeabout->image2,
            'content' => $request->content,
            'experience' => $request->experience,
            'features' => $request->features,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('Admin.pages.home')->with('success', 'About updated successfully.');
    }


    public function destroy(HomeAbout $homeabout)
    {
        $homeabout->delete();
        return redirect()->route('Admin.pages.home')->with('success', 'Homeabout deleted successfully.');
    }
}
