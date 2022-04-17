<?php

namespace App\Http\Controllers\User\Dashboard\KelasUser;

use App\Http\Controllers\Controller;
use App\Models\Admin\DetailFaq;
use App\Models\Admin\DetailKuis;
use App\Models\Admin\DetailVideo;
use App\Models\Admin\Kelas;
use App\Models\DetailUserKelas;
use App\Models\User\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KelasUserController extends Controller
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
        $kelas = DetailUserKelas::with('Kelas','User')->where('id','=',Auth::user()->id)->groupBy('id_kelas')->get();
        return view('user.dashboard.userkelas.index',compact('today','tanggal_tahun','kelas'));
    }

    public function FilterFinished()
    {
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal_tahun = Carbon::now()->format('j F Y');
        $kelas = DetailUserKelas::with('Kelas','User')->where('status_kelas','=','Sudah Selesai')->where('id','=',Auth::user()->id)->groupBy('id_kelas')->get();
        return view('user.dashboard.userkelas.index',compact('today','tanggal_tahun','kelas'));
    }
    
    public function FilterUnFinished()
    {
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal_tahun = Carbon::now()->format('j F Y');
        $kelas = DetailUserKelas::with('Kelas','User')->where('status_kelas','=','Progress')->where('id','=',Auth::user()->id)->orWhere('status_kelas','=','Gagal Kuis')->groupBy('id_kelas')->get();
        return view('user.dashboard.userkelas.index',compact('today','tanggal_tahun','kelas'));
    }

    public function FilterGagalKuis()
    {
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal_tahun = Carbon::now()->format('j F Y');
        $kelas = DetailUserKelas::with('Kelas','User')->where('status_kelas','=','Gagal Kuis')->where('id','=',Auth::user()->id)->groupBy('id_kelas')->get();
        return view('user.dashboard.userkelas.index',compact('today','tanggal_tahun','kelas'));
    }

    public function Sertifikat($id)
    {
        $kelas = DetailUserKelas::where('id_kelas', '=', $id)->where('id', Auth::user()->id)->first();
        return view('user.dashboard.sertifikat.sertifikat', compact('kelas'));
    }

    public function Kuis($id_kelas)
    {
        $kuis = DetailKuis::with('Kelas')->where('id_kelas', $id_kelas)->get();
        $count_kuis =DetailKuis::with('Kelas')->where('id_kelas', $id_kelas)->count();

        $kelas = Kelas::where('id_kelas', $id_kelas)->first();
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal_tahun = Carbon::now()->format('j F Y');
        return view('user.dashboard.userkelas.kuis', compact('kuis','today','tanggal_tahun','kelas','count_kuis'));
    }

    public function KirimJawaban(Request $request, $id_kelas)
    {
       $detail = DetailUserKelas::where('id', Auth::user()->id)->where('id_kelas','=', $id_kelas)->first();
       $detail->nilai_kuis = $request->nilai;
       $detail->nilai_max = $request->poin_soal;

       if($request->nilai >= $request->nilai_min){
            $detail->status_kelas = 'Sudah Selesai';
       }else{
            $detail->status_kelas = 'Gagal Kuis';
        }
       $detail->save();

       return $request;
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
    public function show($id)
    {
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal_tahun = Carbon::now()->format('j F Y');
        $kelas = Kelas::with('Detailvideo','Detailkeypoint','DetailMentor','Jeniskelas')->find($id);
        
        return view('user.dashboard.userkelas.detail', compact('today','tanggal_tahun','kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal_tahun = Carbon::now()->format('j F Y');
        $vid = DetailVideo::with('Kelas','Keypoint')->find($id);
        
        return view('user.dashboard.userkelas.video', compact('vid','today','tanggal_tahun'));
    }

    public function FinishClass($id_kelas)
    {
        $detail = DetailUserKelas::with('Kelas')->where('id', Auth::user()->id)->where('id_kelas', $id_kelas)->first();
        $review = Review::where('id_kelas', $id_kelas)->where('id', Auth::user()->id)->first();

        return view('user.dashboard.userkelas.finish_class',compact('detail','review'));
    }

    public function Gagal($id_kelas)
    {
        $detail = DetailUserKelas::with('Kelas')->where('id', Auth::user()->id)->where('id_kelas', $id_kelas)->first();

        return view('user.dashboard.userkelas.gagal_kuis',compact('detail'));
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
        $review = Review::where('id_kelas', $id)->where('id', Auth::user()->id)->first();

        if(empty($review)){
            $review = new Review;
            $review->id_kelas = $id;
            $review->id = Auth::user()->id;
            $review->review = $request->review;
            $review->bintang = $request->bintang;
            $review->save();

            return redirect()->back()->with('messageberhasil','Review berhasil disimpan');
        }else{
            return redirect()->back()->with('messagegagal','Review Sudah diinputkan');
        }

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

    public function video($id_video_kelas)
    {
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal_tahun = Carbon::now()->format('j F Y');
        $vid = DetailVideo::with('Kelas','Keypoint')->find($id_video_kelas);

        $kelas = Kelas::with('Detailvideo','Detailkeypoint','Detailmentor','Jeniskelas')->where('id_kelas', $vid->Kelas->id_kelas)->first();

        return view('user.dashboard.userkelas.video', compact('today','tanggal_tahun','vid','kelas'));
    }

    public function selesaikelas($id_kelas)
    {
        return redirect()->route('kelas-saya-kuis', $id_kelas);
    }

    public function Pertanyaan(Request $request, $id_video_kelas)
    {
        $faq = new DetailFaq;
        $faq->id = Auth::user()->id;
        $faq->id_video_kelas = $id_video_kelas;
        $faq->pertanyaan = $request->pertanyaan;
        $faq->status_faq = 'Belum Terjawab';
        $faq->id_mentor = $request->id_mentor;
        $faq->id_kelas = $request->id_kelas;
        $faq->save();

        return redirect()->route('kelas-saya-video', $id_video_kelas)->with('messagefaq','Pertanyaan Berhasil dikirim');
        
    }

}
