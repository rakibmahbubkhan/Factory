<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('Admin.pages.services.index', compact('services'));
    }

    public function create()
    {
        return view('Admin.pages.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required',
        ]);

        if ($request->hasFile('image1')) {
            $data['image1'] = $request->file('image1')->store('service_images', 'public');
        }

        Service::create($data);

        return redirect()->route('Admin.services')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('Admin.pages.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required',
        ]);

        if ($request->hasFile('image1')) {
            $data['image1'] = $request->file('image1')->store('service_images', 'public');
        }

        $service->update($data);

        return redirect()->route('Admin.services')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        if ($service->image1) {
            \Storage::delete('public/' . $service->image1);
        }

        $service->delete();

        return redirect()->route('Admin.services')->with('success', 'Service deleted successfully.');
    }

}
