<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Mail\SendContactMail;
use App\Models\Client;
use App\Models\Education;
use App\Models\Experience;
use App\Models\PersonalInformation;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Mail;

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

    public function sendMail(Request $request)
    {
//        $email = $request->email;
        $email = \env('MAIL_FROM_ADDRESS');
        $name = $request->name;
        $message = strip_tags($request->message);
        $mail = new ContactFormMail($name, $message);
        try {
            Mail::to($email)->send($mail);
            return response()->json([
                'success' => true,
                'message' => 'Mesaj Başarıyla Gönderildi!'
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Mesaj Gönderilirken Bir Hata Oluştu Daha Sonra Tekrar Deneyiniz!'
            ]);
        }

    }
}

