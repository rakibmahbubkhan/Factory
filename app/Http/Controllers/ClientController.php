<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('Admin.pages.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('Admin.pages.clients.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'nullable',
        ]);

        if ($request->hasFile('image1')) {
            $data['image1'] = $request->file('image1')->store('client_images', 'public');
        }

        Client::create($data);

        return redirect()->route('Admin.clients')->with('success', 'client created successfully.');
    }

    public function edit(Client $client)
    {
        return view('Admin.pages.clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'nullable',
        ]);

        if ($request->hasFile('image1')) {
            $data['image1'] = $request->file('image1')->store('client_images', 'public');
        }

        $client->update($data);

        return redirect()->route('Admin.clients')->with('success', 'client updated successfully.');
    }

    public function destroy(Client $client)
    {
        if ($client->image1) {
            \Storage::delete('public/' . $client->image1);
        }

        $client->delete();

        return redirect()->route('Admin.clients')->with('success', 'client deleted successfully.');
    }
}
