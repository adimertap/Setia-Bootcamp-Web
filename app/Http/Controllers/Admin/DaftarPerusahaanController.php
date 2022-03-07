<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan\Pelamar;
use App\Models\Perusahaan\Pengumuman;
use App\Models\Perusahaan\ProfilePerusahaan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaftarPerusahaanController extends Controller
{
    public function getPerusahaan()
    {
        $perusahaan = ProfilePerusahaan::with('User')->get();
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        return view('admin.daftarperusahaan.daftarperusahaan',compact('perusahaan','today','tanggal'));
    }

    public function showPerusahaan($id)
    {
        $perusahaan = ProfilePerusahaan::with('User')->find($id);
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        return view('admin.daftarperusahaan.detailperusahaan',compact('perusahaan','today','tanggal'));
    }

    public function getLowongan()
    {
        $pengumuman = Pengumuman::with('User.Perusahaan')->get();
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        return view('admin.daftarperusahaan.daftarlowonga',compact('pengumuman','today','tanggal'));
    }

    public function showLowongan($id)
    {
        $pengumuman = Pengumuman::with('User.Perusahaan')->find($id);
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        return view('admin.daftarperusahaan.detaillowongan',compact('pengumuman','today','tanggal'));
    }
}
