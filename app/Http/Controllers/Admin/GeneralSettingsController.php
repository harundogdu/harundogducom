<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GeneralSettingsController extends Controller
{
    public function index()
    {
        $generalSettings = GeneralSettings::find(1);
        return view('admin.general_settings_edit', compact('generalSettings'));
    }

    public function postData(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $generalSettings = GeneralSettings::find(1);
        $generalSettings->update($data);
        Alert::success('İşlem Başarılı!', 'Genel Bilgiler Başarıyla Güncellendi!');
        return redirect()->route('general-settings');
    }
}
