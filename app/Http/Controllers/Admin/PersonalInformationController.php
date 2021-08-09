<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PersonalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PersonalInformationController extends Controller
{
    public function index()
    {
        $personalInformation = PersonalInformation::find(1);
        return view('admin.personal_information_edit', compact('personalInformation'));
    }

    public function postData(Request $request)
    {
        $this->validate($request, [
            'image' => 'mimes:jpg,bmp,png',
            'cv' => 'mimes:pdf,doc,docx'
        ], [
            'image.mimes' => 'Uzantılar "jpg,bmp,png" olabilir!',
            'cv.mimes' => 'Uzantılar "pdf,doc,docx" olabilir!'
        ]);

        $personalInformation = PersonalInformation::find(1);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileOriginalName = $file->getClientOriginalName();
            $explode = explode('.', $fileOriginalName);

            $fileOriginalName = Str::slug($explode[0], '-') . '-' . now()->format('d-m-Y_H-i-s') . '.' . $extension;
            Storage::putFileAs('public/image', $file, $fileOriginalName);
            $personalInformation->image = 'image/' . $fileOriginalName;
        }

        if ($request->file('cv')) {
            $file = $request->file('cv');
            $extension = $file->getClientOriginalExtension();
            $fileOriginalName = $file->getClientOriginalName();
            $explode = explode('.', $fileOriginalName);

            $fileOriginalName = Str::slug($explode[0], '-') . '-' . now()->format('d-m-Y_H-i-s') . '.' . $extension;
            Storage::putFileAs('public/cv', $file, $fileOriginalName);
            $personalInformation->cv = 'cv/' . $fileOriginalName;
        }

        $personalInformation->name = $request->name;
        $personalInformation->job = $request->job;
        $personalInformation->information_title = $request->information_title;
        $personalInformation->birthday = $request->birthday;
        $personalInformation->website = $request->website;
        $personalInformation->phone = $request->phone;
        $personalInformation->mail = $request->mail;
        $personalInformation->location = $request->location;
        $personalInformation->specialLanguages = $request->specialLanguages;
        $personalInformation->interests = $request->interests;
        $personalInformation->main_title = $request->main_title;
        $personalInformation->subtitle = $request->subtitle;
        $personalInformation->completed_project = $request->completed_project;
        $personalInformation->happy_clients = $request->happy_clients;
        $personalInformation->awards_recieved = $request->awards_recieved;
        $personalInformation->footer = $request->footer;

        $personalInformation->save();

        Alert::success('İşlem Başarılı!', 'Kişisel Bilgiler Başarıyla Güncellendi!');
        return redirect()->route('personal-information');
    }
}

