<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::all();
        return view('admin.services_list', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        Services::create($data);
        Alert::success('İşlem Başarılı!', 'Servis Başarıyla Eklendi!');
        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Services::find($id);
        return view('admin.services_edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = Services::find($id) ?? abort('404', 'Böyle Bir Sayfa Bulunamadı!');
        $data = $request->all();
        unset($data['_token'], $data['_method']);
        $service->update($data);
        Alert::success('İşlem Başarılı!', 'Servis Başarıyla Güncellendi!');
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Services::find($id) ?? abort(404, 'Böyle Bir Sayfa Bulunamadı!');
        $service->delete();
        Alert::success('İşlem Başarılı!', 'Servis Başarıyla Silindi!');
        return redirect()->route('services.index');
    }

    public function changeStatus(Request $request)
    {
        $services = Services::where('id', $request->id)->first();
        $services->status = !$services->status;

        if ($services->save()) {
            return response()->json([
                'success' => true,
                'status' => $services->status
            ], 200);
        }
        return response()->json([
            'success' => false
        ], 500);
    }
}
