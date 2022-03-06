@extends('layouts.app')

@section('name')
Community Bootcamp
@endsection

@section('content')
<main>

    <section class="pricing" style="margin-top: 0px">
        <div class="container">
            <div class="row ">
                <div class="col-lg-5 col-12 header-wrap copywriting">
                    <p class="story">
                        GOOD INVESTMENT
                    </p>
                    <h2 class="primary-header text-white">
                        Cari Lowongan
                    </h2>
                    <p class="support">
                        Learn how to speaking in public to demonstrate your <br> final project and receive the important
                        feedbacks
                    </p>
                    <p class="mt-5">
                        <a href="#carilowongan" class="btn btn-master btn-thirdty me-3">
                            Yuk Cari
                        </a>
                    </p>
                </div>
                <div class="col-lg-7 col-12 ">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="text-center">
                                <img src="{{asset('image/job.png')}}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pb-70">
                <div class="col-lg-12 col-12 text-center">
                    <img src="{{asset('images/brands.png')}}" height="30" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials" style="margin-top: 0px" id="carilowongan">
        <div class="container-fluid">
            <div class="row text-center pb-70">
                <div class="col-lg-12 col-12 header-wrap">
                    <p class="story">
                        MULAI MENCARI
                    </p>
                    <h2 class="primary-header">
                        List Lowongan Pekerjaan
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12 col-12">
                    <div class="row">
                        @forelse ($pengumuman as $item)
                        <div class="col-lg-3 col-12">
                            <div class="item-review">
                                <div class="user">
                                        <img src="{{ url('perusahaan/logo/'. $item->User->avatar) }}" class="photo" alt="">
                                    <div class="info">
                                        
                                        <h4 class="name">
                                            {{ $item->nama_pengumuman }}
                                        </h4>
                                        <p class="role">
                                            {{ $item->User->Perusahaan->nama_legal }}
                                        </p>
                                    </div>
                                </div>
                                <p class="message">
                                    Kami mencari pegawai {{ $item->job_type }}, pengalaman
                                    {{ $item->job_years_experience }} Tahun, qualification {{ $item->qualification }}
                                    dengan kisaran gaji Rp. {{ number_format($item->job_salary) }}.
                                </p>
                                <div class="row">
                                    <div class="col-4">
                                        <p class="role" style="font-size: 12px">
                                            Post On {{ $item->start_date }}
                                        </p>
                                    </div>
                                    <div class="col-8">
                                        <p class="cta">
                                            <a href="{{ route('community.show', $item->id_pengumuman) }}" class="btn btn-master btn-secondary">
                                                Detail Lowongan
                                            </a>
                                        </p>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        @empty
                        <h2 class="primary-header">
                            Belum Terdapat Lowongan Pekerjaan pada Community Page, Mohon Bersabar!
                        </h2>

                        @endforelse

                    </div>
                </div>
            </div>
    </section>





</main>





@endsection
