<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients_list', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients_add');
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
        unset($data['_token'], $data['image']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileOriginalName = $file->getClientOriginalName();
            $explode = explode('.', $fileOriginalName);

            $fileOriginalName = Str::slug($explode[0], '-') . '-' . now()->format('d-m-Y_H-i-s') . '.' . $extension;
            Storage::putFileAs('public/clients', $file, $fileOriginalName);
            $data['image'] = 'clients/' . $fileOriginalName;
        }
        Client::create($data);

        Alert::success('İşlem Başarılı!', 'Başarıyla Eklendi!');
        return redirect()->route('clients.index');
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
        $client = Client::find($id);
        return view('admin.clients_edit', compact('client'));
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
        $client = Client::find($id) ?? abort('404', 'Böyle Bir Sayfa Bulunamadı!');
        $data = $request->all();
        unset($data['_token'], $data['image'], $data['_method']);

        if ($request->hasFile('image')) {

            if (file_exists(public_path('storage/' . $client->image))) {
                unlink(public_path('storage/' . $client->image));
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileOriginalName = $file->getClientOriginalName();
            $explode = explode('.', $fileOriginalName);

            $fileOriginalName = Str::slug($explode[0], '-') . '-' . now()->format('d-m-Y_H-i-s') . '.' . $extension;
            Storage::putFileAs('public/clients', $file, $fileOriginalName);
            $data['image'] = 'clients/' . $fileOriginalName;
        }

        $client->update($data);

        Alert::success('İşlem Başarılı!', 'Başarıyla Güncellendi!');
        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id) ?? abort(404, 'Böyle Bir Sayfa Bulunamadı!');

        try {
            if (file_exists(public_path('storage/' . $client->image))) {
                unlink(public_path('storage/' . $client->image));
            }
        } catch (\Exception $exception) {
            return $exception;
        }

        $client->delete();

        Alert::success('İşlem Başarılı!', 'Başarıyla Silindi!');
        return redirect()->route('clients.index');
    }

    public function changeStatus(Request $request)
    {
        $client = Client::where('id', $request->id)->first();
        $client->status = !$client->status;

        if ($client->save()) {
            return response()->json([
                'success' => true,
                'status' => $client->status
            ], 200);
        }
        return response()->json([
            'success' => false
        ], 500);
    }
}
