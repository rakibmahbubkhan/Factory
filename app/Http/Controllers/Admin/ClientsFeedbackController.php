<?php

namespace App\Http\Controllers\Admin;

use App\Models\Home\ClientsFeedbacks;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientsFeedbackController extends Controller
{
    public function index()
    {
        $clientsFeedbacks = ClientsFeedbacks::all();
        return view('Admin.pages.ClientsFeedbacks.index', compact('clientsFeedbacks'));
    }

    public function create()
    {
        return view('Admin.pages.ClientsFeedbacks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'feedback' => 'required|string',
            'isActive' => 'boolean',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('clients_feedback_images', 'public');
        }

        ClientsFeedbacks::create($data);

        return redirect()->route('Admin.pages.home')->with('success', 'Feedback added successfully.');
    }

    public function show($id)
    {
        $clientsFeedback = ClientsFeedbacks::findOrFail($id);
        return view('Admin.pages.ClientsFeedbacks.show', compact('clientsFeedback'));
    }

    public function edit($id)
    {
        $clientsFeedback = ClientsFeedbacks::findOrFail($id);
        return view('Admin.pages.ClientsFeedbacks.edit', compact('clientsFeedback'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'feedback' => 'required|string',
            'isActive' => 'boolean',
        ]);

        $clientsFeedback = ClientsFeedbacks::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($clientsFeedback->image) {
                \Storage::delete('public/' . $clientsFeedback->image);
            }
            $data['image'] = $request->file('image')->store('clients_feedback_images', 'public');
        }

        $clientsFeedback->update($data);

        return redirect()->route('Admin.pages.home')->with('success', 'Feedback updated successfully.');
    }

    public function destroy($id)
    {
        $clientsFeedback = ClientsFeedbacks::findOrFail($id);

        if ($clientsFeedback->image) {
            \Storage::delete('public/' . $clientsFeedback->image);
        }

        $clientsFeedback->delete();

        return redirect()->route('clients-feedbacks.index')->with('success', 'Feedback deleted successfully.');
    }
}
