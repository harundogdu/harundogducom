<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = Experience::all();
        return view('admin.experience_list',compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.experience_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $experience = Experience::create([
            'experience_date' => $request->experience_date,
            'experience_job' => $request->experience_job,
            'experience_company' => $request->experience_company,
            'status' => $request->status,
            'experience_description' => $request->experience_description,
        ]);

        alert()->success('İşlem Başarılı!', 'Deneyim bilgileriniz başarıyla eklendi!');
        return redirect()->route('experience.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experience = Experience::whereId($id)->first();
        return view('admin.experience_edit',compact('experience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $experience = Experience::whereId($id)->first();
        $experience->update($request->all());

        alert()->success('İşlem Başarılı!', 'Deneyim bilgileriniz başarıyla güncellendi!');
        return redirect()->route('experience.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        $experience = Experience::where('id', $request->id)->first();
        $experience->status = !$experience->status;

        if ($experience->save()) {
            return response()->json([
                'success' => true,
                'status' => $experience->status
            ], 200);
        }
        return response()->json([
            'success' => false
        ], 500);
    }
}
