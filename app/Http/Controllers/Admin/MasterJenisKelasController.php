<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JenisKelasRequest;
use App\Models\Admin\JenisKelas;
use Illuminate\Http\Request;

class MasterJenisKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis_kelas = JenisKelas::get();

        return view('admin.masterdata.jeniskelas',compact('jenis_kelas'));
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
    public function store(JenisKelasRequest $request)
    {
        $jenis_kelas = new JenisKelas;
        $jenis_kelas->jenis_kelas = $request->jenis_kelas;
        $jenis_kelas->keterangan = $request->keterangan;
        
        $jenis_kelas->save();
        return redirect()->back()->with('messageberhasil','Data Master Jenis Kelas Berhasil ditambahkan');
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
        $jenis_kelas = JenisKelas::find($id);
        $jenis_kelas->jenis_kelas = $request->jenis_kelas;
        $jenis_kelas->keterangan = $request->keterangan;

        $jenis_kelas->update();
        return redirect()->back()->with('messageberhasil','Data Master Jenis Kelas Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis_kelas = JenisKelas::find($id);
        $jenis_kelas->delete();

        return redirect()->back()->with('messagehapus','Data Master Jenis Kelas Berhasil dihapus');
    }
}
