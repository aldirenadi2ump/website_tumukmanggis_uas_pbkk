<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Warga::where('nama_warga', 'LIKE', '%' . $request->search . '%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        } else {
            $data = Warga::paginate(5);



            Session::put('halaman_url', request()->fullUrl());
        }


        return view('warga.warga', compact('data'));
    }

    public function addwarga()
    {
        return view('warga.addwarga');
    }

    public function tampilkandata($id)
    {
        $data = Warga::where('id_user', $id)->get()->first();

        return view('warga.tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {

        if ($request->hasFile('foto_warga')) {
            $request->file('foto_warga')->move('foto_warga/', $request->file('foto_warga')->getClientOriginalName());
            $fotoWarga = $request->file('foto_warga')->getClientOriginalName();
        } else {
            $fotoWarga = '';
        }

        $data = Warga::where('id_user', $id)->update([
            'nama_warga' => $request->nama_warga,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jeniskelamin' => $request->jeniskelamin,
            'status' => $request->status,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'pekerjaan' => $request->pekerjaan,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'foto_warga' => $fotoWarga,
        ]);


        $user = User::find($id);
        $user->email = $request->email;
        $user->name = $request->nama_warga;
        $user->save();

        if (session('halaman_url')) {
            return redirect(session('halaman_url'))->with('success', 'Data Berhasil Diubah');
        }
        return redirect()->route('warga')->with('success', 'Data Berhasil Diubah');
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
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function show(Warga $warga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function edit(Warga $warga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warga $warga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warga  $warga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warga $warga)
    {
        //
    }
}
