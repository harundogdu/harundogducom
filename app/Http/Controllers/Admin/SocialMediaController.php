<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = SocialMedia::orderBy('order', 'ASC')
            ->orderBy('name', 'ASC')
            ->get();
        return view('admin.social-media_list', compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.social-media_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SocialMedia::create($request->all());
        Alert::success('İşlem Başarılı', 'Sosyal Medya Başarıyla Kayıt Edildi!');
        return redirect()->route('social-media.index');
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
        $social = SocialMedia::find($id);
        return view('admin.social-media_edit', compact('social'));
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
        $social = SocialMedia::find($id);
        $social->update($request->all());

        Alert::success('İşlem Başarılı!', 'Sosyal Medya Başarıyla Güncellendi!');
        return redirect()->route('social-media.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        $social = SocialMedia::where('id', $request->id)->first();
        $social->status = !$social->status;

        if ($social->save()) {
            return response()->json([
                'success' => true,
                'status' => $social->status
            ], 200);
        }
        return response()->json([
            'success' => false
        ], 500);
    }
}
