<?php

namespace App\Http\Controllers;

use App\Models\Kematian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KematianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Kematian::where('nama_lengkap', 'LIKE', '%' . $request->search . '%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        } else {
            $data = Kematian::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }
        return view('kematian.kematian', compact('data'));
    }

    public function addkematian()
    {
        return view('kematian.addkematian');
    }

    public function insertdata(Request $request)
    {
        $this->validate($request, [
            'nama_lengkap' => 'required|min:3|max:100',
        ]);

        Kematian::create($request->all());
        return redirect()->route('kematian')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampilkandata($id)
    {
        $data = Kematian::find($id);
        return view('kematian.tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Kematian::find($id);
        $data->update($request->all());
        if (session('halaman_url')) {
            return redirect(session('halaman_url'))->with('success', 'Data Berhasil Diubah');
        }
        return redirect()->route('kematian')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $data = Kematian::find($id);
        $data->delete();
        return redirect()->route('kematian')->with('success', 'Data Berhasil Dihapus');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function show(Kematian $kematian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function edit(Kematian $kematian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kematian $kematian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kematian $kematian)
    {
        //
    }
}
