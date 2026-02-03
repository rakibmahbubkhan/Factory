<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::first();
        $company->phone = json_decode($company->phone, true);
        return view('Admin.pages.companies.index', compact('company'));
    }

    // Show the form for creating a new company record
    public function create()
    {
        // Show the form to create a new company
        return view('Admin.pages.companies.create');
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        $company->phone = json_decode($company->phone, true);
        return view('Admin.pages.companies.edit', compact('company'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'logo' => 'nullable|image',
            'address' => 'required|string',
            'phone' => 'required|array',
            'phone.*' => 'required|string|max:255',
            'main_contact' => 'required|string|max:255',
            'email' => 'required|email',
            'twitter' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'map' => 'nullable|string',
            'opens_from' => 'required|string|max:255',
            'ends_in' => 'required|string|max:255',
            'opens_at' => 'required|date_format:H:i',
            'ends_at' => 'required|date_format:H:i',
            'copyright' => 'nullable|string|max:255',
        ]);

        $company = new Company();
        $company->company_name = $validated['company_name'];
        $company->address = $validated['address'];
        $company->phone = json_encode($validated['phone']); // Save as JSON
        $company->main_contact = $validated['main_contact'];
        $company->email = $validated['email'];
        $company->twitter = $validated['twitter'];
        $company->facebook = $validated['facebook'];
        $company->linkedin = $validated['linkedin'];
        $company->youtube = $validated['youtube'];
        $company->map = $validated['map'];
        $company->opens_from = $validated['opens_from'];
        $company->ends_in = $validated['ends_in'];
        $company->opens_at = $validated['opens_at'];
        $company->ends_at = $validated['ends_at'];
        $company->copyright = $validated['copyright'];

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $company->logo = $path;
        }

        $company->save();

        return redirect()->route('Admin.setting.edit', $company->id);
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'logo' => 'nullable|image',
            'address' => 'required|string',
            'phone' => 'required|array',
            'phone.*' => 'required|string|max:255',
            'main_contact' => 'required|string|max:255',
            'email' => 'required|email',
            'twitter' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'map' => 'nullable|string',
            'opens_from' => 'required|string|max:255',
            'ends_in' => 'required|string|max:255',
            'opens_at' => 'required',
            'ends_at' => 'required',
            'copyright' => 'nullable|string|max:255',
        ]);

        $company->company_name = $validated['company_name'];
        $company->address = $validated['address'];
        $company->phone = json_encode($validated['phone']); // Save as JSON
        $company->main_contact = $validated['main_contact'];
        $company->email = $validated['email'];
        $company->twitter = $validated['twitter'];
        $company->facebook = $validated['facebook'];
        $company->linkedin = $validated['linkedin'];
        $company->youtube = $validated['youtube'];
        $company->map = $validated['map'];
        $company->opens_from = $validated['opens_from'];
        $company->ends_in = $validated['ends_in'];
        $company->opens_at = $validated['opens_at'];
        $company->ends_at = $validated['ends_at'];
        $company->copyright = $validated['copyright'];

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $company->logo = $path;
        }

        $company->save();

        return redirect()->route('Admin.setting.edit', $company->id);
    }



}
