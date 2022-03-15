<?php

namespace App\Http\Controllers\User\Dashboard\Portofolio;

use App\Http\Controllers\Controller;
use App\Models\Admin\Kelas;
use App\Models\DetailUserKelas;
use App\Models\User\Portofolio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortofolioSayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $porto = Portofolio::with('Kelas','User')->where('id', Auth::user()->id)->get();
      
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal_tahun = Carbon::now()->format('j F Y');
        return view('user.dashboard.portofolio.index',compact('today','tanggal_tahun','porto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = DetailUserKelas::with('User','Kelas')->where('id', Auth::user()->id)->where('status_kelas','=','Sudah Selesai')->get();
        return view('user.dashboard.portofolio.create',compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Portofolio::where('id', Auth::user()->id)->where('id_kelas','=', $request->id_kelas)->first();

        if(empty($validation)){
            if ($request->file('url_gambar')) {
                $imagePath = $request->file('url_gambar');
                $url_gambar = $imagePath->getClientOriginalName();
               
                $imagePath->move(public_path().'/porto/', $url_gambar); 
                $data[] = $url_gambar;
            }
    
            $porto = new Portofolio;
            $porto->id = Auth::user()->id;
            $porto->id_kelas = $request->id_kelas;
            $porto->nama_project = $request->nama_project;
            $porto->deskripsi_project = $request->deskripsi_project;
            $porto->url_project = $request->url_project;
            $porto->url_gambar = $url_gambar;
            $porto->save();
    
            return redirect()->route('portofolio-saya.index')->with('messageberhasil','Data Portofolio Berhasil ditambahkan');
        }else{
            return redirect()->back()->with('validation','Data Portofolio Telah Ada');
        }

       
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Portofolio::with('User','Kelas')->find($id);
        return view('user.dashboard.portofolio.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $porto = Portofolio::with('User','Kelas')->find($id);
        $kelas = DetailUserKelas::with('User','Kelas')->where('id', Auth::user()->id)->where('status_kelas','=','Sudah Selesai')->get();
        return view('user.dashboard.portofolio.edit', compact('porto','kelas'));
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
        $porto = Portofolio::find($id);
        if ($request->file('url_gambar')) {
            $imagePath = $request->file('url_gambar');
            $url_gambar = $imagePath->getClientOriginalName();
           
            $imagePath->move(public_path().'/porto/', $url_gambar); 
            $data[] = $url_gambar;
            $porto->url_gambar = $url_gambar;
        }

        $porto->id = Auth::user()->id;
        $porto->id_kelas = $request->id_kelas;
        $porto->nama_project = $request->nama_project;
        $porto->deskripsi_project = $request->deskripsi_project;
        $porto->url_project = $request->url_project;
        $porto->update();

        return redirect()->route('portofolio-saya.index')->with('messageberhasil','Data Portofolio Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $porto = Portofolio::find($id);
        $porto->delete();

        return redirect()->back()->with('messagehapus','Data Portofolio berhasil dihapus');
    }
}
