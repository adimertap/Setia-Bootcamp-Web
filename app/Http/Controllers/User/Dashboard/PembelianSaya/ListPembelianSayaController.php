<?php

namespace App\Http\Controllers\User\Dashboard\PembelianSaya;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListPembelianSayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkout = Checkout::with('Kelas','User')->where('id', Auth::user()->id)->get();
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal_tahun = Carbon::now()->format('j F Y');
        
        return view('user.dashboard.checkoutsaya.index', compact('today','tanggal_tahun','checkout'));

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
    public function show($id_checkouts)
    {
        $checkout = Checkout::with('Kelas','Discount','User')->find($id_checkouts);
        return view('user.dashboard.checkoutsaya.invoice', compact('checkout'));
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
