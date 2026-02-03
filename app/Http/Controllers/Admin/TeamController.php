<?php

namespace App\Http\Controllers\Admin;

use App\Models\Home\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('Admin.pages.Teams.index', compact('teams'));
    }

    public function create()
    {
        return view('Admin.pages.Teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'link' => 'nullable|url',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('team_images', 'public');
        }

        Team::create($data);

        return redirect()->route('teams.index')->with('success', 'Team member added successfully.');
    }

    public function show($id)
    {
        $team = Team::findOrFail($id);
        return view('Admin.pages.Teams.show', compact('team'));
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('Admin.pages.Teams.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'link' => 'nullable|url',
        ]);

        $team = Team::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($team->image) {
                \Storage::delete('public/' . $team->image);
            }
            $data['image'] = $request->file('image')->store('team_images', 'public');
        }

        $team->update($data);

        return redirect()->route('teams.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);

        if ($team->image) {
            Storage::delete('public/' . $team->image);
        }

        $team->delete();

        return redirect()->route('teams.index')->with('success', 'Team member deleted successfully.');
    }
}
