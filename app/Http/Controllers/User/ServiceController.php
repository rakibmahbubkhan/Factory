<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Home\ClientsFeedbacks;
use App\Models\Service;

class ServiceController extends Controller
{
    //

    public function index()
    {
        $company = Company::first();
        $services = Service::all();
        $clientsFeedbacks = ClientsFeedbacks::all();
        return view('Service.service', compact('company', 'services', 'clientsFeedbacks'));
    }
}
