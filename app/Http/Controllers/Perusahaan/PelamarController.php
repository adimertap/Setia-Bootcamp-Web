<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan\Pelamar;
use App\Models\Perusahaan\Pengumuman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal_tahun = Carbon::now()->format('j F Y');
       

        $pelamar = Pelamar::with('User','Pengumuman')->join('tb_pengumuman','tb_pelamar.id_pengumuman','tb_pengumuman.id_pengumuman')
        ->where('id_perusahaan', Auth::user()->id)
        ->get();
        
        return view('perusahaan.pelamar.index',compact('pelamar','today','tanggal_tahun'));
    }

    public function getFile($file_cv)
    {
        $file_path = public_path('Resume/'.$file_cv);
        return response()->download($file_path);
    }

    public function getFilePendukung($file_dukungan)
    {
        $file_path = public_path('Resume/'.$file_dukungan);
        return response()->download($file_path);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Pelamar::with('User','Pengumuman')->find($id);
        return view('perusahaan.pelamar.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
