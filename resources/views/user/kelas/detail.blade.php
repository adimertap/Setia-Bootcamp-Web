@extends('layouts.app')

@section('content')

<section class="checkout">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12 col-12 header-wrap">
                <h4>
                    <span  class="badge badge-primary">Premium Edition</span>
                </h4>
                <h1 class="primary-header mt-5">
                    {{ $kelas->nama_kelas }}
                </h1>
            </div>

            <section class="benefits">
                <div class="container">
                    <div class="row text-center pb-70">
                        <div class="col-lg-12 col-12 header-wrap">
                            <p class="small">
                                Learn how to build a real project from scratch
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-12">
                            <div class="item-benefit">
                                <h3 class="title">
                                    Jenis Kelas
                                </h3>
                                <p class="support" style="color: blue">
                                    {{ $kelas->Jeniskelas->jenis_kelas }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="item-benefit">
                                <h3 class="title">
                                    Jumlah Member
                                </h3>
                                <p class="support" style="color: blue">
                                    <b>500</b> enrolled
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="item-benefit">
                                <h3 class="title">
                                    Tingkatan
                                </h3>
                                <p class="support" style="color: blue">
                                    Level {{ $kelas->Level->nama_level }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="item-benefit">
                                <h3 class="title">
                                    Sertifikat
                                </h3>
                                <p class="support">
                                    <img src="https://buildwithangga.com/themes/front/images/ic_check_blue.svg" alt="">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xxl-8 col-xl-12 mb-4">
                <div class="iframe-wrapper text-center">
                    <iframe src="{{$kelas->Detailvideo[0]->url_video}}" width="560" height="315" allowfullscreen></iframe>
                </div>
                    
            </div>
            <div class="col-xxl-4 col-xl-6 mb-4">
                <div class="card card-waves h-100">
                   
                    <div class="card-body">
                            <h5 class="mb-5 mt-2"> <span class="badge badge-primary">{{ $count_video }} Lesson Video</span></h5>
                        </h6>
                        @foreach ($video_sedikit as $vids)
                        <div class="timeline timeline-m mt-3">
                            <div class="timeline-item bg-light">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-indicator bg-primary-soft text-primary">Vid</div>
                                </div>
                                <div class="timeline-item-content">{{ $vids->nama_video }}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="card-footer bg-primary">
                        <a type="button" class="bg-primary">Lanjutkan Belajar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-lg-9 col-12">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="item-bootcamp">
                        <img src="{{ asset('/image/'.$kelas['cover_kelas']) }}" alt="" class="cover">
                        <h1 class="package">
                            
                            Develop Your Skill
                        </h1>
                        <p class="description">
                            {{ $kelas->tentang_kelas }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-1 col-12">

                </div>
                <div class="col-lg-6 col-12">
                    <form action="{{ route('success-checkout') }}" class="basic-form">
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Occupation</label>
                            <input type="text" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-4">
                            <label for="exampleInputEmail1" class="form-label">Card Number</label>
                            <input type="number" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-5">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <label for="exampleInputEmail1" class="form-label">Expired</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="col-lg-6 col-12">
                                    <label for="exampleInputEmail1" class="form-label">CVC</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="w-100 btn btn-primary">Pay Now</button>
                        <p class="text-center subheader mt-4">
                            <img src="{{ asset('images/ic_secure.svg') }}" alt=""> Your payment is secure and encrypted.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
