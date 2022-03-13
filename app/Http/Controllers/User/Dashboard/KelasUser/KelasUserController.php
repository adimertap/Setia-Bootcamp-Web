<?php

namespace App\Http\Controllers\User\Dashboard\KelasUser;

use App\Http\Controllers\Controller;
use App\Models\Admin\DetailVideo;
use App\Models\Admin\Kelas;
use App\Models\DetailUserKelas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasUserController extends Controller
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

        $kelas = DetailUserKelas::with('Kelas','User')->where('status_kelas','!=','Waiting Payment')->where('id','=',Auth::user()->id)->groupBy('id_kelas')->get();
        return view('user.dashboard.userkelas.index',compact('today','tanggal_tahun','kelas'));
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
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal_tahun = Carbon::now()->format('j F Y');
        $kelas = Kelas::with('Detailvideo','Detailkeypoint','DetailMentor','Jeniskelas')->find($id);
        

        return view('user.dashboard.userkelas.detail', compact('today','tanggal_tahun','kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal_tahun = Carbon::now()->format('j F Y');
        $vid = DetailVideo::with('Kelas','Keypoint')->find($id);
        
        return view('user.dashboard.userkelas.video', compact('vid','today','tanggal_tahun'));
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

    public function video($id_video_kelas)
    {
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal_tahun = Carbon::now()->format('j F Y');
        $vid = DetailVideo::with('Kelas','Keypoint')->find($id_video_kelas);

        $kelas = Kelas::with('Detailvideo','Detailkeypoint','Detailmentor','Jeniskelas')->where('id_kelas', $vid->Kelas->id_kelas)->first();

        return view('user.dashboard.userkelas.video', compact('today','tanggal_tahun','vid','kelas'));
    }

    public function selesaikelas($id_kelas)
    {
        $detail = DetailUserKelas::with('Kelas','User')->where('id_kelas','=', $id_kelas)->where('id', Auth::user()->id)->first();
        $detail->status_kelas = 'Sudah Selesai';
        $detail->update();

        return redirect()->route('kelas-saya.index')->with('messageberhasil','Kelas Berhasil diselesaikan, Lihat Sertif pada menu Ceritificate');
    }

}
