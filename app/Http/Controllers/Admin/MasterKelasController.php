<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KelasRequest;
use App\Models\Admin\JenisKelas;
use App\Models\Admin\Kelas;
use App\Models\Admin\Level;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MasterKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::with('Jeniskelas','level')->get();
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        return view('admin.masterdata.kelas.index', compact('kelas','today','tanggal')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_kelas = JenisKelas::get();
        $level = Level::get();

        $id = Kelas::getId();
        foreach ($id as $value);
        $idlama = $value->id_kelas;
        $idbaru = $idlama + 1;
        $blt = date('m');
        $kode_kelas = 'Kelas-' . $idbaru . '/' . $blt;

        return view('admin.masterdata.kelas.create', compact('jenis_kelas','level','kode_kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KelasRequest $request)
    {
        if ($request->hasfile('cover_kelas')) {


            foreach ($request->file('cover_kelas') as $image) {

                $name = $image->getClientOriginalName();
                $image->move(public_path() . '/image/', $name);
                $data[] = $name;
            }
        }

        $kelas = new Kelas;
        $kelas->kode_kelas = $request->kode_kelas;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->id_jenis_kelas = $request->id_jenis_kelas;
        $kelas->id_level = $request->id_level;
        $kelas->harga_kelas = $request->harga_kelas;
        $kelas->tentang_kelas = $request->tentang_kelas;
        $kelas->status = 'Aktif';
        $kelas->slug = Str::slug($request->nama_kelas);
        $kelas->cover_kelas = $name;
        $kelas->save();
        
        return redirect()->route('kelas.index')->with('messageberhasil', 'Data Kelas Berhasil ditambahkan');
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
