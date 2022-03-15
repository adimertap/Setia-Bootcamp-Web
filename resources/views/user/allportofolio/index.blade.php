@extends('layouts.app')

@section('name')
Community Bootcamp
@endsection

@section('content')
<main>

    <section class="steps" style="margin-top: 40px">
        <div class="container-fluid">
            <div class="row item-step">
                <div class="col-lg-6 col-12 text-center">
                    <img src="{{ asset('images/step4.png') }}" class="cover" alt="">
                </div>
                <div class="col-lg-6 col-12 text-left copywriting">
                    <p class="story">
                        Hasil Karya Member
                    </p>
                    <h2 class="primary-header">
                        Portofolio & Kesempatan Bekerja
                    </h2>
                    <p class="support">
                        Anda berkesempatan untuk memamerkan hasil karya Anda selama <br>belajar di satria bootcamp dan
                        berkesempatan dilirik perusahaan besar
                    </p>
                    <p class="mt-5">
                        <a href="#" class="btn btn-master btn-secondary me-3">
                            Yuk Lihat Sejenak
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials" style="margin-top: 0px" id="carilowongan">
        <div class="container-fluid">
            <div class="row text-center pb-70">
                <div class="col-lg-12 col-12 header-wrap">
                    <p class="story">
                        Satria Bootcamp
                    </p>
                    <h2 class="primary-header">
                        Hasil Karya Member
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12 col-12">
                    <div class="row">
                        @forelse ($porto as $item)
                        <div class="col-lg-3 col-12">
                            <div class="item-review" style="border-radius: 30px">
                                <img src="{{ asset('/porto/'.$item['url_gambar']) }}" class="img-fluid" alt="" />
                                <div class="user">
                                    <img src="{{ $item->User->avatar }}" class="photo" alt=""
                                        style="border-radius: 50px">
                                    <div class="info">

                                        <h4 class="name">
                                            {{ $item->nama_project }}
                                        </h4>
                                        <p class="role">
                                            {{ $item->User->name }}
                                        </p>
                                    </div>
                                </div>
                                <p class="message" style="min-height: 0px">
                                    Telah menyelesaikan kelas {{ $item->Kelas->nama_kelas }}
                                    
                                </p>
                                <p class="message" style="margin-top: 10px;min-height:0px">
                                    URL Project: {{ $item->url_project }}
                                </p>
                                <p class="cta">
                                    <a href="{{ route('portofolio.show', $item->id_portofolio) }}"
                                        class="btn btn-master btn-secondary">
                                        Detail Project
                                    </a>
                                </p>
                            </div>
                        </div>
                        @empty
                        <h2 class="primary-header">
                            Belum Terdapat Portofolio pada Community Page, Upload Portofolio Kamu Sekarang Juga!
                        </h2>

                        @endforelse

                    </div>
                </div>
            </div>
    </section>





</main>





@endsection
