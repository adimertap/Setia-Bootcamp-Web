<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\DetailMentor;
use App\Models\Admin\Kelas;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListMentorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $mentor = User::where('role','=','Mentor')->get();
        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');
        $kelas = Kelas::with('Jeniskelas','Level')->get();

        return view('admin.menumentor.listmentor.index', compact('mentor','today','tanggal','kelas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menumentor.listmentor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('avatar')) {
            $imagePath = $request->file('avatar');
            $avatar = $imagePath->getClientOriginalName();
           
            $imagePath->move(public_path().'/image/', $avatar); 
            $data[] = $avatar;
          }

        $mentor = new User;
        $mentor->name  = $request->name;
        $mentor->email = $request->email;
        $mentor->password = bcrypt($request->password);
        $mentor->avatar = $avatar;
        $mentor->role = 'Mentor';
        $mentor->email_verified_at = Carbon::now();
        $mentor->save();

        event(new Registered($mentor));

        Auth::login($mentor);

        return redirect()->route('list-mentor.index')->with('messageberhasil','Data Mentor Berhasil ditambahkan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mentor = User::with('Detailkelas','Detailkelas.Jeniskelas','Detailkelas.level')->find($id);
        // return $mentor;
        $kelas = Kelas::with('Jeniskelas','Level')->get();

        return view('admin.menumentor.listmentor.detail',compact('mentor','kelas'));
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
       $mentor = User::find($id);
       $mentor->Detailkelas()->sync($request->detailkelas);
       return $mentor;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mentor = User::find($id);
        $mentor->delete();

        return redirect()->back()->with('messagehapus','Data Mentor Berhasil dihapus');
    }

    public function kelasdestroy($id_kelas)
    {
        $mentor = DetailMentor::find($id_kelas);
        
        
        $mentor->delete();

        return redirect()->back()->with('messagehapus','Data Mentor Berhasil dihapus');
    }
  
}
