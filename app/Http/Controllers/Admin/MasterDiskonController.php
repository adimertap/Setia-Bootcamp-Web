<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiskonRequest;
use App\Models\Admin\DetailDiskon;
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
        $detail = DetailDiskon::join('tb_master_diskon', 'tb_detail_diskon.id_diskon','tb_master_diskon.id_diskon')
        ->where('status_diskon','=','Aktif')->get();

        return view('admin.masterdata.diskon',compact('diskon','kelas','detail'));
    }

    public function UpdateStatus(Request $request)
    {
        if($request->mode == "true")
            {
                $detail = DetailDiskon::where('id_diskon','=', $request->id_diskon)->restore();
                $tes = Diskon::where('id_diskon', '=', $request->id_diskon)->update(array('status_diskon' => 'Aktif'));
                

                // $detail->restore();
            }
            else
            {
                $detail = DetailDiskon::where('id_diskon','=', $request->id_diskon)->delete();
                $tes = Diskon::where('id_diskon', '=', $request->id_diskon)->update(array('status_diskon' => 'Tidak Aktif'));
              
                // $detail->delete();
            }
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

        $id = Diskon::getId();
        foreach($id as $value);
        $idlama = $value->id_diskon;
        $idbaru = $idlama + 1;
        $blt = date('y-m');
        $kode_flashsale = 'FlashSale-'.$blt.'/'.$idbaru;

        if(empty($data)){
            if($request->jenis_diskon == 'Voucher'){
                $diskon = new Diskon;
                $diskon->kode_diskon = $request->kode_diskon;
                $diskon->nama_diskon = $request->nama_diskon;
                $diskon->jumlah_diskon = $request->jumlah_diskon;
                $diskon->jenis_diskon = 'Voucher';
                $diskon->description = $request->description;
                $diskon->status_diskon = 'Aktif';
                $diskon->save();
    
            }else if($request->jenis_diskon == 'FlashSale'){
                
                $diskon = new Diskon;
                $diskon->kode_diskon = $kode_flashsale;
                $diskon->nama_diskon = $request->nama_diskon;
                $diskon->jumlah_diskon = $request->jumlah_diskon;
                $diskon->description = $request->description;
                $diskon->jenis_diskon = 'FlashSale';
                $diskon->status_diskon = 'Aktif';
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
        $diskon->nama_diskon = $request->nama_diskon;
        $diskon->jumlah_diskon = $request->jumlah_diskon;
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
        if($diskon->jenis_diskon == 'FlashSale'){
            DetailDiskon::where('id_diskon', $id)->delete();
            $diskon->delete();
        }else{
            $diskon->delete();
        }

        return redirect()->back()->with('messagehapus','Data Master Diskon Berhasil dihapus');
    }
}
