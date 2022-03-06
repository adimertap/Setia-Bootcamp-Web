<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DaftarPerusahaanController extends Controller
{
    public function getPerusahaan()
    {
        $checkout = Checkout::with('User','Kelas')->get();
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        return view('admin.detailkelas.listpembayaran.index',compact('checkout','today','tanggal'));
    }

    public function getLowongan()
    {
        $checkout = Checkout::with('User','Kelas')->get();
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        return view('admin.detailkelas.listpembayaran.index',compact('checkout','today','tanggal'));
    }
}
