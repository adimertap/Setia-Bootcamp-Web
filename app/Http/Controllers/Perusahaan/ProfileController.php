<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan\ProfilePerusahaan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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
        $profile = ProfilePerusahaan::with('User')->where('id', Auth::user()->id)->first();

        return view('perusahaan.profile.index', compact('today','tanggal_tahun','profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perusahaan.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('avatar')) {
            $imagePath = $request->file('avatar');
            $avatar = $imagePath->getClientOriginalName();
           
            $imagePath->move(public_path().'/image/', $avatar); 
            $data[] = $avatar;

            $profile = new ProfilePerusahaan;
            $profile->id = Auth::user()->id;
            $profile->nama_legal = $request->nama_legal;
            $profile->jenis_perusahaan = $request->jenis_perusahaan;
            $profile->tanggal_berdirinya = $request->tanggal_berdirinya;
            $profile->alamat_kantor = $request->alamat_kantor;
            $profile->alamat_website = $request->alamat_website;
            $profile->no_telp = $request->no_telp;
            $profile->description = $request->description;
            $profile->foto_perusahaan = $avatar;
            $profile->save();
    
            $tes = User::where('id', $profile->id_perusahaan)->first();
            $tes->avatar = $request->avatar;
            $tes->update();
        }else{
            $profile = new ProfilePerusahaan;
            $profile->id = Auth::user()->id;
            $profile->nama_legal = $request->nama_legal;
            $profile->jenis_perusahaan = $request->jenis_perusahaan;
            $profile->tanggal_berdirinya = $request->tanggal_berdirinya;
            $profile->alamat_kantor = $request->alamat_kantor;
            $profile->alamat_website = $request->alamat_website;
            $profile->no_telp = $request->no_telp;
            $profile->description = $request->description;
            $profile->save();
        }

        return redirect()->route('perusahaan.dashboard')->with('messageberhasil','Data Perusahaan Berhasil ditambahkan');
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
        $profile = ProfilePerusahaan::with('User')->find($id);
        return view('perusahaan.profile.edit', compact('profile'));
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
        $profile = ProfilePerusahaan::find($id);
        $profile->nama_legal = $request->nama_legal;
        $profile->jenis_perusahaan = $request->jenis_perusahaan;
        $profile->tanggal_berdirinya = $request->tanggal_berdirinya;
        $profile->alamat_kantor = $request->alamat_kantor;
        $profile->alamat_website = $request->alamat_website;
        $profile->no_telp = $request->no_telp;
        $profile->description = $request->description;
        $profile->update();

        return redirect()->route('perusahaan.dashboard')->with('messageberhasil','Data Profile Perusahaan Berhasil diedit');
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
