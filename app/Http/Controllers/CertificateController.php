<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::all();
        return view('Admin.pages.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('Admin.pages.certificates.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('certificate_images', 'public');
        }

        Certificate::create($data);

        return redirect()->route('certificates.index')->with('success', 'Certificate created successfully.');
    }

    public function edit(Certificate $certificate)
    {
        return view('Admin.pages.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('certificate_images', 'public');
        }

        $certificate->update($data);

        return redirect()->route('certificates.index')->with('success', 'Certificate updated successfully.');
    }

    public function destroy(Certificate $certificate)
    {
        if ($certificate->image) {
            Storage::delete('public/' . $certificate->image);
        }

        $certificate->delete();

        return redirect()->route('certificates.index')->with('success', 'Certificate deleted successfully.');
    }
}
