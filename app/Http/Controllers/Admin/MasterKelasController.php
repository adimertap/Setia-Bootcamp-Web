<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KelasRequest;
use App\Models\Admin\DetailMentor;
use App\Models\Admin\JenisKelas;
use App\Models\Admin\Kelas;
use App\Models\Admin\Level;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $kelas = Kelas::with('Jeniskelas','Level')->leftJoin('tb_detail_mentor', 'tb_master_kelas.id_kelas','tb_detail_mentor.id_kelas')
        ->leftjoin('users','tb_detail_mentor.id','users.id')
        ->get();

        // $kelas = Kelas::with('Jeniskelas','level')->get();

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

        $mentor = User::where('role','=','Mentor')->get();

        return view('admin.masterdata.kelas.create', compact('jenis_kelas','level','kode_kelas','mentor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KelasRequest $request)
    {
        if ($request->file('cover_kelas')) {
            $imagePath = $request->file('cover_kelas');
            $imageName = $imagePath->getClientOriginalName();
           
            $imagePath->move(public_path().'/image/', $imageName); 
            $data[] = $imageName;
          }

        $kelas = new Kelas;
        $kelas->kode_kelas = $request->kode_kelas;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->id_jenis_kelas = $request->id_jenis_kelas;
        $kelas->id_level = $request->id_level;
        $kelas->harga_kelas = $request->harga_kelas;
        $kelas->tentang_kelas = $request->tentang_kelas;
        $kelas->status = 'Tidak Aktif';
        $kelas->slug = Str::slug($request->nama_kelas);
        $kelas->cover_kelas = $imageName;
        $kelas->status_video = 'Belum Dibuat';
        $kelas->status_approval_video = 'Pending';
        $kelas->status_keypoint == 'Belum Dibuat';
        $kelas->save();

        $detailmentor = new DetailMentor;
        $detailmentor->id = $request->id;
        $detailmentor->id_kelas = $kelas->id_kelas;
        $detailmentor->save();
        
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
        $kelas = Kelas::with('Jeniskelas','Level','Detailkeypoint','Detailvideo')->leftJoin('tb_detail_mentor', 'tb_master_kelas.id_kelas','tb_detail_mentor.id_kelas')
        ->leftjoin('users','tb_detail_mentor.id','users.id')
        ->find($id);

        // $kelas = Kelas::with('Jeniskelas','level','Detailkeypoint','Detailvideo')->find($id);

        return view('admin.masterdata.kelas.detail')->with([
            'kelas' => $kelas
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::with('Jeniskelas','level')->find($id);
        $jenis_kelas = JenisKelas::get();
        $level = Level::get();

        return view('admin.masterdata.kelas.edit', compact('jenis_kelas','level','kelas'));
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
        $kelas = Kelas::with('Jeniskelas','level')->findOrFail($id);

        if ($request->file('cover_kelas')) {
            $imagePath = $request->file('cover_kelas');
            $imageName = $imagePath->getClientOriginalName();
           
            $imagePath->move(public_path().'/image/', $imageName); 
            $data[] = $imageName;

            $kelas->kode_kelas = $request->kode_kelas;
            $kelas->nama_kelas = $request->nama_kelas;
            $kelas->id_jenis_kelas = $request->id_jenis_kelas;
            $kelas->id_level = $request->id_level;
            $kelas->harga_kelas = $request->harga_kelas;
            $kelas->tentang_kelas = $request->tentang_kelas;
            $kelas->status = $request->status;
            $kelas->slug = Str::slug($request->nama_kelas);
            $kelas->update(['file' => $imageName]);
            $kelas->update();
        }else {
            $kelas->kode_kelas = $request->kode_kelas;
            $kelas->nama_kelas = $request->nama_kelas;
            $kelas->id_jenis_kelas = $request->id_jenis_kelas;
            $kelas->id_level = $request->id_level;
            $kelas->harga_kelas = $request->harga_kelas;
            $kelas->tentang_kelas = $request->tentang_kelas;
            $kelas->status = $request->status;
            $kelas->slug = Str::slug($request->nama_kelas);
            $kelas->update();
        }



        
       
        
        return redirect()->route('kelas.index')->with('messageberhasil', 'Data Kelas Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $tes = DetailMentor::where('id_kelas', $id)->first();
        $tes->delete();
        $kelas->delete();

        return redirect()->back()->with('messagehapus','Data Kelas Berhasil Terhapus');
    }

    public function launch(Request $request, $id_kelas)
    {

        $item = Kelas::findOrFail($id_kelas);
        $item->status = 'Aktif';

        $item->save();
        return redirect()->back()->with('messagelaunch', 'Kelas berhasil diposting dan dilaunching');
    }
}
