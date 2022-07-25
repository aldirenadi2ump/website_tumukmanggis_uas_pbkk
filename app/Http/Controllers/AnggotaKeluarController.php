<?php

namespace App\Http\Controllers;

use App\Models\Anggotakeluar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AnggotakeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Anggotakeluar::where('name', 'LIKE', '%' . $request->search . '%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        } else {
            $data = Anggotakeluar::paginate(5);



            Session::put('halaman_url', request()->fullUrl());
        }

        return view('anggotakeluar.anggotakeluar', compact('data'));
    }

    public function addanggotakeluar()
    {
        $data = User::where('role', 'anggota')->get();
        return view('anggotakeluar.addanggotakeluar', compact('data'));
    }

    public function insertdata(Request $request)
    {
        $this->validate($request, [
            'alasan' => 'required|min:3|max:50',
            'tanggal_keluar' => 'required',
            'status_aktif' => 'required',
            'id_user' => 'required'
        ]);

        $anggotakeluar = new Anggotakeluar;
        $anggotakeluar->id_user = $request->id_user;
        $anggotakeluar->alasan = $request->alasan;
        $anggotakeluar->tanggal_keluar = $request->tanggal_keluar;
        $anggotakeluar->save();

        $akun_anggota = User::find($request->id_user);
        $akun_anggota->is_active = $request->status_aktif;
        $akun_anggota->save();

        return redirect()->route('anggotakeluar')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampilkandata($id)
    {
        $data = User::where('role', 'anggota')->get();
        $anggotakeluar = Anggotakeluar::find($id);
        return view('anggotakeluar.tampildata', compact('data', 'anggotakeluar'));
    }

    public function updatedata(Request $request, $id)
    {
        $this->validate($request, [
            'alasan' => 'required|min:3|max:50',
            'tanggal_keluar' => 'required',
            'status_aktif' => 'required',
            'id_user' => 'required'
        ]);

        $anggotakeluar = Anggotakeluar::find($id);
        $anggotakeluar->id_user = $request->id_user;
        $anggotakeluar->alasan = $request->alasan;
        $anggotakeluar->tanggal_keluar = $request->tanggal_keluar;
        $anggotakeluar->save();

        $akun_anggota = User::find($request->id_user);
        $akun_anggota->is_active = $request->status_aktif;
        $akun_anggota->save();

        return redirect()->route('anggotakeluar')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        Anggotakeluar::where('id', $id)->delete();
        return redirect()->route('anggotakeluar')->with('success', 'Data Berhasil Dihapus');
    }
}
