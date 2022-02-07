<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Kelas;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApprovalVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::with('Jeniskelas','Level')->leftJoin('tb_detail_mentor', 'tb_master_kelas.id_kelas','tb_detail_mentor.id_kelas')
        ->join('users','tb_detail_mentor.id','users.id')->where('status_video', 'Telah Dibuat')->where('status_keypoint','Telah Dibuat')
        ->get();
     
        // $kelas = Kelas::with('Jeniskelas','Level','DetailMentor.User')->get();
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');
        
        return view('admin.approvalvideo.index',compact('kelas','today','tanggal'));
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
        $kelas = Kelas::with('Jeniskelas','Level','Detailvideo','Detailkeypoint')->leftJoin('tb_detail_mentor', 'tb_master_kelas.id_kelas','tb_detail_mentor.id_kelas')
        ->join('users','tb_detail_mentor.id','users.id')->find($id);

        return view('admin.approvalvideo.detail',compact('kelas'));
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

    public function setStatus(Request $request, $id_kelas)
    {
        $request->validate([
            'status' => 'required|in:Disetujui,Ditolak,Pending'
        ]);

        $item = Kelas::findOrFail($id_kelas);
        $item->status_approval_video = $request->status;
        $item->keterangan_approval = $request->keterangan_approval;
        
        $item->save();
        return redirect()->route('approval-video.index');
    }
}
