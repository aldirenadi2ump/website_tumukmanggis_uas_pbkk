<?php

namespace App\Http\Controllers;

use App\Models\Pernikahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PernikahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Pernikahan::where('nama_pria', 'LIKE', '%' . $request->search . '%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        } else {
            $data = Pernikahan::paginate(5);



            Session::put('halaman_url', request()->fullUrl());
        }


        return view('pernikahan.pernikahan', compact('data'));
    }

    public function addpernikahan()
    {
        return view('pernikahan.addpernikahan');
    }

    public function insertdata(Request $request)
    {
        $this->validate($request, [
            'nama_pria' => 'required|min:3|max:100',
            'nama_wanita' => 'required|min:3|max:100',
        ]);

        Pernikahan::create($request->all());
        return redirect()->route('pernikahan')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampilkandata($id)
    {

        $data = Pernikahan::find($id);

        return view('pernikahan.tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Pernikahan::find($id);
        $data->update($request->all());
        if (session('halaman_url')) {
            return redirect(session('halaman_url'))->with('success', 'Data Berhasil Diubah');
        }
        return redirect()->route('pernikahan')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $data = Pernikahan::find($id);
        $data->delete();
        return redirect()->route('pernikahan')->with('success', 'Data Berhasil Dihapus');
    }
}
