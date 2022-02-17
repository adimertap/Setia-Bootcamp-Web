<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\DetailKeypoint;
use App\Models\Admin\DetailVideo;
use App\Models\Admin\Kelas;
use Illuminate\Http\Request;

class ProgramKelasUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::with('Jeniskelas','Level')->leftJoin('tb_detail_mentor', 'tb_master_kelas.id_kelas','tb_detail_mentor.id_kelas')
        ->leftjoin('users','tb_detail_mentor.id','users.id')->where('status','=','Aktif')
        ->get();

        return view('user.kelas.list_class',compact('kelas'));
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
        $kelas = Kelas::with('Jeniskelas','Level','Detailkeypoint','Detailvideo')->find($id);

        $count_video = DetailVideo::where('id_kelas', '=', $id)->count();
        $video_sedikit = DetailVideo::where('id_kelas', '=', $id)->take(5)->get();
        $video_lengkap = DetailVideo::where('id_kelas', '=', $id)->get();

        $modul = DetailKeypoint::where('id_kelas', '=', $id)->get();
        return view('user.kelas.detail',compact('kelas', 'count_video' ,'video_sedikit','video_lengkap','modul'));

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
