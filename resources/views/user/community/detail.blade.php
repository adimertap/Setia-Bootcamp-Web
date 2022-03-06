@extends('layouts.app')

@section('name')
Lowongan {{ $item->User->Perusahaan->nama_legal }}
@endsection

@section('content')
<main>

   
    <section class="testimonials" style="margin-top: 0px" id="carilowongan">
        <div class="container">
            <div class="row text-center pb-70">
                <div class="col-lg-12 col-12 header-wrap">
                    <p class="story">
                        Detail Lowongan
                    </p>
                    <h2 class="primary-header">
                       Lowongan dari {{ $item->User->Perusahaan->nama_legal }}
                    </h2>
                </div>
            </div>
            @if(session('messageberhasil'))
            <div class="alert alert-success" role="alert"> <i class="fas fa-check" style="border-radius: 20px"></i>
                {{ session('messageberhasil') }}
            </div>
            @endif
            @if(session('messagewarning'))
            <div class="alert alert-warning" role="alert"> <i class="fas fa-check" style="border-radius: 20px"></i>
                {{ session('messagewarning') }}
            </div>
            @endif
            
            <div class="row justify-content-center">
                <div class="col-lg-12 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="item-review ">
                                <div class="user text-center">
                                    <img src="{{ url('perusahaan/logo/'. $item->User->avatar) }}"  height="300" width="300" alt="">
                                    <div class="info">
                                        <h4 class="name">
                                            {{ $item->User->Perusahaan->nama_legal }}
                                        </h4>
                                        <p class="role">
                                           Jenis Perusahaan {{ $item->User->Perusahaan->jenis_perusahaan }}
                                        </p>
                                    </div>
                                </div>
                                <p class="message"  style="text-align: justify">
                                   {{ $item->User->Perusahaan->description }}
                                </p>
                                <p class="cta text-center">
                                    <a href="{{ route('community-profile', $item->User->Perusahaan->id_perusahaan) }}" class="btn btn-master btn-secondary">
                                        Profile Perusahaan
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-8 col-12">
                            <div class="item-review">
                                <div class="user">
                                    <img src="{{ url('perusahaan/logo/'. $item->User->avatar) }}" class="photo" alt="">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="info">
                                                <h4 class="name">
                                                    {{ $item->nama_pengumuman }}
                                                </h4>
                                                <p class="role">
                                                    {{ $item->User->Perusahaan->nama_legal }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <p class="role">
                                                End in {{ $item->end_date }}
                                            </p>
                                        </div>
                                    </div>
                                   
                                </div>
                                <p class="message">
                                    Kami mencari pegawai {{ $item->job_type }}, pengalaman
                                    {{ $item->job_years_experience }} Tahun, qualification {{ $item->qualification }}
                                    dengan kisaran gaji Rp. {{ number_format($item->job_salary) }}.
                                </p>
                                <hr>
                                <h6 class="name">
                                    Job Description
                                </h6>
                                <p class="message" style="margin-top: 2px">
                                    {{ $item->job_description }}
                                </p>
                                <hr>
                                <h6 class="name" style="margin-top: 10px">
                                    Job Requirement
                                </h6>
                                <p class="message" style="margin-top: 2px">
                                    {{ $item->job_requirement }}
                                </p>


                                @if (Auth::user()->role == 'User' || Auth::user()->role == 'Admin')
                                <p class="cta text-right">
                                    <a href="{{ route('community.edit', $item->id_pengumuman) }}" class="btn btn-master btn-secondary">
                                        Apply Now
                                    </a>
                                </p>
                                @else
                                    
                                @endif
                              
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </section>





</main>





@endsection
