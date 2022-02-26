<?php

namespace App\Http\Controllers\User\Checkout;

use App\Http\Controllers\Controller;
use App\Models\Admin\Kelas;
use App\Models\Checkout;
use App\Models\DetailUserKelas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.checkout.checkout');
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
    public function show($id, Request $request)
    {
        
        $detail = DetailUserKelas::where('id', Auth::user()->id)->where('id_kelas','=',$id)->exists();

        if ($detail != null){
            $request->session()->flash('error', "You already registered on This Class");
            return redirect()->route('user.dashboard');
        }

        $kelas = Kelas::with('Jeniskelas','Level','Detailkeypoint','Detailvideo','DetailMentor.User')->find($id);
        return view('user.checkout.checkout',compact('kelas'));
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
       $checkout = new Checkout;
       $checkout->card_number = $request->card_number;
       $checkout->cvc = $request->cvc;
       $checkout->expired = $request->expired;
       $checkout->tanggal = Carbon::today();
       $checkout->id_kelas = $id;
       $checkout->id = Auth::user()->id;
       $checkout->save();

       $user = Auth::user();
       $user->email = $request->email;
       $user->name = $request->name;
       $user->occupation = $request->occupation;
       $user->save();

       $detail = new DetailUserKelas;
       $detail->id = $checkout->id;
       $detail->id_kelas = $id;
       $detail->status_kelas = 'Waiting Payment';
       $detail->save();

       return redirect()->route('checkout-success')->with('messageberhasil','Selamat Anda Berhasil Melakukan Checkout Kelas');
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

    public function success(){
        return view('success_checkout');
    }
}
