<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Models\Admin\DetailKeypoint;
use App\Models\Admin\DetailMentor;
use App\Models\Admin\DetailVideo;
use App\Models\Admin\Kelas;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class MentorVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = DetailMentor::with('Kelas')->where('id', Auth::user()->id)->first();
        $jumlah_video = DetailVideo::where('id_kelas', $class->id_kelas)->count();
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        return view('mentor.listvideo.index', compact('class','today','tanggal','jumlah_video')); 
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::with('Jeniskelas','Level')->find($id);
        $keypoint = DetailKeypoint::where('id_kelas', $id)->get();

        return view('mentor.listvideo.edit', compact('kelas','keypoint'));
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
        $video = Kelas::find($id);
        $video->status_video = 'Telah Dibuat';
        $video->update();
        
        $video->detailvideo()->delete();
        $video->detailvideo()->insert($request->video);
        return $request;
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
