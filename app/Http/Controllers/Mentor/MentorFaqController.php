<?php

namespace App\Http\Controllers\Mentor;

use App\Http\Controllers\Controller;
use App\Mail\FAQMail;
use App\Models\Admin\DetailFaq;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MentorFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = DetailFaq::with('User','Kelas','Video')->where('id_mentor', Auth::user()->id)->get();

        $today = Carbon::now()->isoFormat('dddd');
        $tanggal = Carbon::now()->format('j F Y');

        return view('mentor.listfaq.index', compact('today','tanggal','faq'));
    }

    public function sendEmail(Request $request, $id_faq)
    {
        
        $data = [
          'subject' => 'Jawaban Pertanyaan',
          'name' => $request->name,
          'email' => $request->email,
          'jawaban_faq' => $request->jawaban_faq,
          'nama_kelas' => $request->nama_kelas,
          'pertanyaan' => $request->pertanyaan,
          'nama_mentor' => Auth::user()->name
        ];

        // Mail::send('email-template', $data, function($message) use ($data) {
        //   $message->to($data['email'])
        //   ->subject($data['subject']);
        // });

        $faq = DetailFaq::find($id_faq);
        $faq->status_faq = 'Terjawab';
        $faq->update();


        Mail::to($request->email)->send(new FAQMail($data));   

        return back()->with(['message' => 'Email successfully sent!']);
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
