<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Certificate;
use App\Models\Company;
use App\Models\Home\Statistic;
use App\Models\Home\Team;

class AboutController extends Controller
{
    //

    public function index()
    {
        $company = Company::first();
        $statistic = Statistic::first();
        $teams = Team::all();
        $about = About::first();
        $certificates = Certificate::all();
        return view('About.about', compact('company', 'statistic', 'teams', 'about','certificates'));
    }
}
