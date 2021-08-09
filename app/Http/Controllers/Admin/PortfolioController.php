<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use function GuzzleHttp\Promise\all;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolio_list', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio_add');
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
            $fileOriginalName = $file->getClientOriginalName();
            $explode = explode('.', $fileOriginalName)[0];
            $fileOriginalExtension = $file->getClientOriginalExtension();
            $newName = $explode . "_" . now()->format('d-m-Y_H_i_s') . "." . $fileOriginalExtension;

            Storage::putFileAs('public/portfolio/', $file, $newName);
            $data['image'] = 'portfolio/' . $newName;
        }

        Portfolio::create($data);

        Alert::success('İşlem Başarılı', 'Portfolyo Bilgisi Başarıyla Eklendi!');
        return redirect()->route('portfolio.index');
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
        $portfolio = Portfolio::find($id) ?? abort('404');
        return view('admin.portfolio_edit', compact('portfolio'));
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
        $portfolio = Portfolio::find($id);

        $data = $request->all();
        unset($data['_token'], $data['image'], $data['_method']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileOriginalName = $file->getClientOriginalName();
            $explode = explode('.', $fileOriginalName)[0];
            $fileOriginalExtension = $file->getClientOriginalExtension();
            $newName = $explode . "_" . now()->format('d-m-Y_H_i_s') . "." . $fileOriginalExtension;

            if (file_exists(public_path('storage/' . $portfolio->image))) {
                unlink(public_path('storage/' . $portfolio->image));
            }

            Storage::putFileAs('public/portfolio/', $file, $newName);
            $data['image'] = 'portfolio/' . $newName;
        }

        $portfolio->update($data);

        Alert::success('İşlem Başarılı', 'Portfolyo Bilgisi Başarıyla Güncellendi!');
        return redirect()->route('portfolio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);

        if (file_exists(public_path('storage/' . $portfolio->image))) {
            unlink(public_path('storage/' . $portfolio->image));
        }

        $portfolio->delete();

        Alert::success('İşlem Başarılı', 'Portfolyo Bilgisi Başarıyla Eklendi!');
        return redirect()->route('portfolio.index');
    }

    public function changeStatus(Request $request)
    {
        $portfolio = Portfolio::where('id', $request->id)->first();
        $portfolio->status = !$portfolio->status;

        if ($portfolio->save()) {
            return response()->json([
                'success' => true,
                'status' => $portfolio->status
            ], 200);
        }
        return response()->json([
            'success' => false
        ], 500);
    }
}
