<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Diskon;
use Illuminate\Http\Request;

class MasterDiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Diskon::getId();
        foreach($id as $value);
        $idlama = $value->id_diskon;
        $idbaru = $idlama + 1;
        $blt = date('m');

        $kode_diskon = 'Diskon-'.$blt.'/'.$idbaru;
        $diskon = Diskon::get();

        return view('admin.masterdata.diskon',compact('diskon','kode_diskon'));
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
        $diskon = new Diskon;
        $diskon->kode_diskon = $request->kode_diskon;
        $diskon->nama_diskon = $request->nama_diskon;
        $diskon->jumlah_diskon = $request->jumlah_diskon;
        $diskon->jenis_diskon = $request->jenis_diskon;

        $diskon->save();
        return redirect()->back()->with('messageberhasil','Data Master Diskon Berhasil ditambahkan');
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
        $diskon = Diskon::find($id);
        $diskon->kode_diskon = $request->kode_diskon;
        $diskon->nama_diskon = $request->nama_diskon;
        $diskon->jumlah_diskon = $request->jumlah_diskon;
        $diskon->jenis_diskon = $request->jenis_diskon;

        $diskon->update();
        return redirect()->back()->with('messageberhasil','Data Master Diskon Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diskon = Diskon::find($id);
        $diskon->delete();

        return redirect()->back()->with('messagehapus','Data Master Diskon Berhasil dihapus');
    }
}
