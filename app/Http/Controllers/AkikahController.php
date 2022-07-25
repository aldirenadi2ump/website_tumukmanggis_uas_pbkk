<?php

namespace App\Http\Controllers;

use App\Models\Akikah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PDF;

class AkikahController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Akikah::where('nama_anak', 'LIKE', '%' . $request->search . '%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        } else {
            $data = Akikah::paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }


        return view('akikah', compact('data'));
    }

    public function addakikah()
    {
        return view('addakikah');
    }

    public function insertdata(Request $request)
    {
        $this->validate($request, [
            'nama_anak' => 'required|min:3|max:50',

        ]);

        $data = Akikah::create($request->all());
        if ($request->hasFile('foto_akikah')) {
            $request->file('foto_akikah')->move('foto_akikah/', $request->file('foto_akikah')->getClientOriginalName());
            $data->foto_akikah = $request->file('foto_akikah')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('akikah')->with('success', 'Data Berhasil Ditambahkan');
    }

    // INSERT DATA TANPA FOTO
    // public function insertdata(Request $request)
    // {
    //     Akikah::create($request->all());
    //     return redirect()->route('akikah')->with('success', 'Data Berhasil Ditambahkan');
    // }

    public function tampilkandata($id)
    {
        $data = Akikah::find($id);

        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Akikah::find($id);
        $data->update($request->all());
        if (session('halaman_url')) {
            return redirect(session('halaman_url'))->with('success', 'Data Berhasil Diubah');
        }
        return redirect()->route('akikah')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $data = Akikah::find($id);
        $data->delete();
        return redirect()->route('akikah')->with('success', 'Data Berhasil Dihapus');
    }

    public function exportpdf()
    {
        $data = Akikah::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('dataakikah-pdf');
        return $pdf->download('data.pdf');
    }
}
