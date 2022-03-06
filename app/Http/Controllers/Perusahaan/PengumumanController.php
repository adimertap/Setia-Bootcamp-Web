<?php

namespace App\Http\Controllers\Perusahaan;

use App\Http\Controllers\Controller;
use App\Models\Perusahaan\Pengumuman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
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
        $pengumuman = Pengumuman::where('id_perusahaan', Auth::user()->id)->get();

        return view('perusahaan.pengumuman.index', compact('today','tanggal_tahun','pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('perusahaan.pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pengumuman = new Pengumuman;
        $pengumuman->nama_pengumuman = $request->nama_pengumuman;
        $pengumuman->job_description = $request->job_description;
        $pengumuman->job_requirement = $request->job_requirement;
        $pengumuman->job_type = $request->job_type;
        $pengumuman->job_salary = $request->job_salary;
        $pengumuman->job_years_experience = $request->job_years_experience;
        $pengumuman->start_date = $request->start_date;
        $pengumuman->end_date = $request->end_date;
        $pengumuman->qualification = $request->qualification;
        $pengumuman->id_perusahaan = Auth::user()->id;
        $pengumuman->save();

        return redirect()->route('perusahaan.dashboard')->with('messageberhasil','Data Pengumuman Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Pengumuman::find($id);
        return view('perusahaan.pengumuman.detail',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Pengumuman::find($id);
        return view('perusahaan.pengumuman.edit',compact('item'));
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
        $pengumuman = Pengumuman::find($id);
        $pengumuman->nama_pengumuman = $request->nama_pengumuman;
        $pengumuman->job_description = $request->job_description;
        $pengumuman->job_requirement = $request->job_requirement;
        $pengumuman->job_type = $request->job_type;
        $pengumuman->job_salary = $request->job_salary;
        $pengumuman->job_years_experience = $request->job_years_experience;
        $pengumuman->start_date = $request->start_date;
        $pengumuman->end_date = $request->end_date;
        $pengumuman->qualification = $request->qualification;
        $pengumuman->update();

        return redirect()->route('perusahaan.dashboard')->with('messageberhasil','Data Pengumuman Berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengumuman = Pengumuman::find($id);
        $pengumuman->delete();

        return redirect()->back()->with('messagehapus','Data Pengumuman Berhasil dihapus');
    }
}
