<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Diskon;
use App\Models\Admin\Kelas;
use App\Models\Checkout;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
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

        $kelas_aktif = Kelas::where('status','Aktif')->count();
        $kelas_today = Kelas::whereDate('created_at', Carbon::today())->count();

        $diskon = Diskon::where('status_diskon', 'Aktif')->count();
        $diskon_today = Diskon::whereDate('created_at', Carbon::today())->count();

        $pending_video = Kelas::where('status_approval_video','Pending')->count();
        $video_today = Kelas::where('status_approval_video','Pending')->whereDate('created_at', Carbon::today())->count();

        $video_belum_buat = Kelas::where('status_video','Belum Dibuat')->count();
        $video_belum_today = Kelas::where('status_video','Belum Dibuat')->whereDate('created_at', Carbon::today())->count();

        $user = User::where('role','User')->count();
        $user_today = User::where('role','User')->whereDate('created_at', Carbon::today())->count();

        $mentor = User::where('role','Mentor')->count();
        $mentor_today = User::where('role','Mentor')->whereDate('created_at', Carbon::today())->count();

        $perusahaan = User::where('role','Perusahaan')->count();
        $perusahaan_today = User::where('role','Perusahaan')->whereDate('created_at', Carbon::today())->count();

        $sum_pendapatan = Checkout::where('payment_status','Paid')->sum('total_price');
        $sum_pendapatan_today = Checkout::where('payment_status','Paid')->whereDate('created_at', Carbon::today())->sum('total_price');


        return view('admin.dashboard', compact('today','tanggal_tahun','kelas_aktif','kelas_today','diskon','diskon_today','pending_video',
        'video_today','video_belum_buat','video_belum_today','user','user_today','mentor','mentor_today','perusahaan','perusahaan_today',
        'sum_pendapatan','sum_pendapatan_today') );
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
