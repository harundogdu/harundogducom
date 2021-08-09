<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Education;
use App\Models\Experience;
use App\Models\PersonalInformation;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $clients = Client::where('status', 1)->orderBy('order', 'ASC')->get();
        $educations = Education::where('status', '1')->get();
        $experiences = Experience::where('status', '1')->get();
        return view('pages.index', compact('educations', 'experiences', 'clients'));
    }

    public function portfolio()
    {
        $portfolios = Portfolio::whereStatus(1)
            ->orderBy('order', 'ASC')
            ->orderBy('title', 'ASC')
            ->get();
        return view('pages.portfolio', compact('portfolios'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}

