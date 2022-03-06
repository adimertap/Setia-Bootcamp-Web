<?php

namespace App\Http\Controllers\User\Community;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan\Pelamar;
use App\Models\Perusahaan\Pengumuman;
use App\Models\Perusahaan\ProfilePerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumuman = Pengumuman::with('User.Perusahaan')->get();
        return view('user.community.index',compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     

    }

    public function profile($id)
    {
        $item = ProfilePerusahaan::with('User')->find($id);
        return view('user.community.detailprofile',compact('item'));

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
        $item = Pengumuman::with('User.Perusahaan')->find($id);
        return view('user.community.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       if(Pelamar::where('id', Auth::user()->id)->exists()){
           
            return redirect()->route('community.show', $id)->with('messagewarning', 'Anda Telah Apply Lamaran pada Lowongan ini');
       }else{
        $item = Pengumuman::with('User.Perusahaan')->find($id);
        $user = Pelamar::with('User','Pengumuman')->where('id', Auth::user()->id)->get();
         
 
         return view('user.community.apply',compact('item','user'));
       }
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pengumuman)
    {

        if ($request->hasFile('file_dukungan')) {
            $imagePath = $request->file('file_dukungan');
            $file_dukungan = $imagePath->getClientOriginalName();
            $imagePath->move(public_path().'/Resume/', $file_dukungan); 
            $data[] = $file_dukungan;

            $Path = $request->file('file_cv');
            $file_cv = $Path->getClientOriginalName();
            $Path->move(public_path().'/Resume/', $file_cv); 
            $data2[] = $file_cv;
            
            $item = new Pelamar;
            $item->id = Auth::user()->id;
            $item->id_pengumuman = $id_pengumuman;
            $item->nama_lengkap = $request->name;
            $item->no_telp = $request->no_telp;
            $item->jenis_kelamin = $request->jenis_kelamin;
            $item->tanggal_lahir = $request->tanggal_lahir;
            $item->alamat_lengkap = $request->alamat_lengkap;
            $item->file_cv = $file_cv;
            $item->file_dukungan = $file_dukungan;
            $item->save();

        }else{
            $Path = $request->file('file_cv');
            $file_cv = $Path->getClientOriginalName();
            $Path->move(public_path().'/Resume/', $file_cv); 
            $data2[] = $file_cv;

            $item = new Pelamar;
            $item->id = Auth::user()->id;
            $item->id_pengumuman = $id_pengumuman;
            $item->nama_lengkap = $request->name;
            $item->no_telp = $request->no_telp;
            $item->jenis_kelamin = $request->jenis_kelamin;
            $item->tanggal_lahir = $request->tanggal_lahir;
            $item->alamat_lengkap = $request->alamat_lengkap;
            $item->file_cv = $file_cv;
            $item->save();
        }

        return redirect()->route('community.show', $id_pengumuman)->with('messageberhasil','Data Lamaran berhasil dikirimkan, mohon tunggu info selanjutnya');
        
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
