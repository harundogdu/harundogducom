<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\PersonalInformation;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $educations = Education::where('status','1')->get();
        $experiences = Experience::where('status','1')->get();
        return view('pages.index',compact('educations','experiences'));
    }
    public function resume(){
        return view('pages.resume');
    }
    public function portfolio(){
        return view('pages.portfolio');
    }
    public function blog(){
        return view('pages.blog');
    }
    public function contact(){
        return view('pages.contact');
    }
}

