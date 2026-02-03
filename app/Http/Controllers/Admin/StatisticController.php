<?php

namespace App\Http\Controllers\Admin;

use App\Models\Home\Statistic;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $statistics = Statistic::first(); // Fetch the first (and only) record
        return view('Admin.pages.Statistics.index', compact('statistics'));
    }

    public function create()
    {
        $statistic = Statistic::first();
        if ($statistic) {
            return redirect()->route('statistics.edit', $statistic->id);
        }
        return view('Admin.pages.Statistics.create');
    }

    public function store(Request $request)
    {
        $statistic = Statistic::first();
        if ($statistic) {
            return redirect()->route('statistics.edit', $statistic->id);
        }

        $request->validate([
            'experience' => 'required|integer',
            'members' => 'required|integer',
            'clients' => 'required|integer',
            'projects' => 'required|integer',
            'created_by' => 'required|integer',
        ]);

        Statistic::create($request->all());

        return redirect()->route('Admin.pages.home')->with('success', 'Statistic created successfully.');
    }

    public function edit(Statistic $statistic)
    {
        return view('Admin.pages.Statistics.edit', compact('statistic'));
    }

    public function update(Request $request, Statistic $statistic)
    {
        $request->validate([
            'experience' => 'required|integer',
            'members' => 'required|integer',
            'clients' => 'required|integer',
            'projects' => 'required|integer',
            'updated_by' => 'required|integer',
        ]);

        $statistic->update($request->all());

        return redirect()->route('Admin.pages.home')->with('success', 'Statistic updated successfully.');
    }

    public function destroy(Statistic $statistic)
    {
        $statistic->delete();

        return redirect()->route('statistics.index')->with('success', 'Statistic deleted successfully.');
    }
}
