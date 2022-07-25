<?php

namespace App\Http\Controllers;

use App\Models\Akikah;
use App\Models\Pernikahan;
use App\Models\Warga;
use App\Models\Kematian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $jumlahakikah = Akikah::count();
        $jumlahpernikahan = Pernikahan::count();
        $jumlahwarga = Warga::count();
        $jumlahkematian = Kematian::count();

        return view('welcome', compact('jumlahakikah', 'jumlahpernikahan', 'jumlahwarga', 'jumlahkematian'));
    }
}
