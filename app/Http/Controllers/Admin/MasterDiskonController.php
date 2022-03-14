<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiskonRequest;
use App\Models\Admin\Diskon;
use App\Models\Admin\Kelas;
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
        $diskon = Diskon::get();
        $kelas = Kelas::with('Jeniskelas')->where('status', '=', 'Aktif')->get();

        return view('admin.masterdata.diskon',compact('diskon','kelas'));
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
        $data = Diskon::where('nama_diskon', $request->nama_diskon)->first();

        if(empty($data)){
            if($request->jenis_diskon == 'Voucher'){
                $diskon = new Diskon;
                $diskon->kode_diskon = $request->kode_diskon;
                $diskon->nama_diskon = $request->nama_diskon;
                $diskon->jumlah_diskon = $request->jumlah_diskon;
                $diskon->jenis_diskon = 'Voucher';
                $diskon->description = $request->description;
                $diskon->save();
    
            }else if($request->jenis_diskon == 'FlashSale'){
                
                $diskon = new Diskon;
                $diskon->nama_diskon = $request->nama_diskon;
                $diskon->kode_diskon = 'Flash Sale';
                $diskon->jumlah_diskon = $request->jumlah_diskon;
                $diskon->description = $request->description;
                $diskon->jenis_diskon = 'FlashSale';
                $diskon->save();
                $diskon->Detailkelas()->sync($request->detailkelas);
            }
        }else{
            throw new \Exception('Nama Diskon Sudah Ada');
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
        $diskon->description = $request->description;

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
