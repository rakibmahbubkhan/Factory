<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Home\ClientsFeedbacks;
use App\Models\Home\HomeAbout;
use App\Models\Home\Qualification;
use App\Models\Home\Slider;
use App\Models\Home\Statistic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('Admin.index');
    }


    public function home()
    {
        $sliders = Slider::all();
        $homeabout = Homeabout::first();
        $statistic = Statistic::first();
        $clientsFeedbacks = ClientsFeedbacks::all();
        $qualification = Qualification::first();

        return view('Admin.pages.home', compact('sliders', 'homeabout', 'statistic', 'clientsFeedbacks', 'qualification'));

    }



}
