<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\DetailUserKelas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
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

        $semua = DetailUserKelas::with('Kelas','User')->where('id', Auth::user()->id)->count();
        $unfinish = DetailUserKelas::with('Kelas','User')->where('id', Auth::user()->id)->where('status_kelas','=','Progress')->count();
        $finish = DetailUserKelas::with('Kelas','User')->where('id', Auth::user()->id)->where('status_kelas','=','Sudah Selesai')->count();
        $checkout = Checkout::with('Kelas','User')->where('id', Auth::user()->id)->where('payment_status','=','Paid')->count();

        return view('user.dashboard.dashboard.index', compact('today','tanggal_tahun','semua','unfinish','finish','checkout'));
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
