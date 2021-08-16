<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Mail\SendContactMail;
use App\Models\Client;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function index()
    {
        $data = [];
        $data['clients'] = Client::query()->where('status', 1)->orderBy('order', 'ASC')->get();
        $data['educations'] = Education::query()->where('status', '1')->get();
        $data['experiences'] = Experience::query()->where('status', '1')->get();
        return view('pages.index', compact('data'));
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
        $emailSend = $request->email;
        $email = \env('MAIL_FROM_ADDRESS');
        $name = $request->name;
        $message = strip_tags($request->message);
        $mail = new ContactFormMail($name, $message, $emailSend);
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

