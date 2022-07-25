<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;



class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = User::where('name', 'LIKE', '%' . $request->search . '%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        } else {
            $data = User::paginate(5);



            Session::put('halaman_url', request()->fullUrl());
        }


        return view('tampilanadmin.admin', compact('data'));
    }

    public function addadmin()
    {
        return view('tampilanadmin.addadmin');
    }

    public function insertdata(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:50',

        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        if ($request->role == 'anggota') {
            Warga::create([
                'nama_warga' => $request->name,
                'id_user' => $user->id
            ]);
        }

        return redirect()->route('admin')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function tampilkandata1($id)
    {

        $data = User::find($id);
        return view('tampilanadmin.tampildata', compact('data'));
    }


    public function updatedata1(Request $request, $id)
    {
        $data = User::find($id);
        $data->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);


        if (session('halaman_url')) {
            return redirect(session('halaman_url'))->with('success', 'Data Berhasil Diubah');
        }
        return redirect()->route('admin')->with('success', 'Data Berhasil Diubah');
    }

    public function delete1($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('admin')->with('success', 'Data Berhasil Dihapus');
    }
}
