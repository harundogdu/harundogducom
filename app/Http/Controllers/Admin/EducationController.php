<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = Education::all();
        return view('admin.education_list', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.education_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $education = Education::create([
            'school_name' => $request->school_name,
            'school_tag' => $request->school_tag,
            'school_date' => $request->school_date,
            'status' => $request->status,
            'school_description' => $request->school_description,
        ]);

        alert()->success('İşlem Başarılı!', 'Eğitim bilgileriniz başarıyla eklendi!');
        return redirect()->route('education.index');
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
        $education = Education::whereId($id)->first();
        return view('admin.education_edit', compact('education'));
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

        $education = Education::whereId($id)->first();
        $education->update($request->all());

        alert()->success('İşlem Başarılı!', 'Eğitim bilgileriniz başarıyla güncellendi!');
        return redirect()->route('education.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education = Education::whereId($id)->first();
        $education->delete();

        return redirect()->route('education.index');
    }


    public function changeStatus(Request $request)
    {
        $education = Education::where('id', $request->id)->first();
        $education->status = !$education->status;

        if ($education->save()) {
            return response()->json([
                'success' => true,
                'status' => $education->status
            ], 200);
        }
        return response()->json([
            'success' => false
        ], 500);
    }
}
