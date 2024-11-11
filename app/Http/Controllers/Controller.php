<?php

namespace App\Http\Controllers;

use App\Models\Skripsi;
use App\Models\Tesis;
use App\Models\Disertasi;
use App\Models\LaporanMagang;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahSkripsi = Skripsi::count();
        $jumlahTesis = Tesis::count();
        $jumlahDisertasi = Disertasi::count();
        $jumlahLaporanMagang = LaporanMagang::count();
        
        return view('admin.dashboard', compact('jumlahSkripsi', 'jumlahTesis', 'jumlahDisertasi', 'jumlahLaporanMagang'));
    }
}