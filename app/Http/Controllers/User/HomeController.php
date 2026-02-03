<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Company;
use App\Models\Home\ClientsFeedbacks;
use App\Models\Home\HomeAbout;
use App\Models\Home\Qualification;
use App\Models\Home\Slider;
use App\Models\Home\Statistic;
use App\Models\Home\Team;
use App\Models\News;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $sliders = Slider::all();
        $homeabout = Homeabout::first();
        $statistic = Statistic::first();
        $clientsFeedbacks = ClientsFeedbacks::all();
        $qualification = Qualification::first();
        $products = Product::all();
        $teams = Team::all();
        $newses = News::orderBy('created_at', 'desc')->take(3)->get();
        $company = Company::first();
        $certificates = Certificate::all();


        return view('Home.home', compact(
            'sliders',
            'homeabout',
            'statistic',
            'clientsFeedbacks',
            'qualification',
            'products',
            'teams',
            'newses',
            'company',
            'certificates'
        ));
    }
}
