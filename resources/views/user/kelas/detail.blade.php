@extends('layouts.app')

@section('content')

<section class="checkout">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12 col-12 header-wrap">
                <h4>
                    <span class="badge badge-primary">Premium Edition</span>
                </h4>
                <h1 class="primary-header mt-5">
                    {{ $kelas->nama_kelas }}
                </h1>
            </div>
            <div class="row text-center mb-5">
                <div class="col-lg-12 col-12 header-wrap">
                    <p class="small">
                        Learn how to build a real project from scratch
                    </p>
                </div>
            </div>

            <section class="benefits">
                <div class="container col-10">
                    <div class="row">
                        <div class="col-lg-3 col-12">
                            <div class="item-benefit">
                                <h3 class="title">
                                    Jenis
                                </h3>
                                <p class="support">
                                    {{ $kelas->Jeniskelas->jenis_kelas }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="item-benefit">
                                <h3 class="title">
                                    Member
                                </h3>
                                <p class="support">
                                    <b>500</b> enrolled
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12">
                            <div class="item-benefit">
                                <h3 class="title">
                                    Tingkatan
                                </h3>
                                <p class="support">
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
                    <iframe src="{{$kelas->Detailvideo[0]->url_video}}" width="560" height="315"
                        allowfullscreen></iframe>
                </div>

            </div>
            <div class="col-xxl-4 col-xl-6 mb-4">
                <div class="card h-100 border-0">
                    <div class="card-body">
                        <h5 class="mb-5 mt-2"> <span class="badge badge-dark">{{ $count_video }} Lesson Video</span>
                        </h5>
                        </h6>
                        @foreach ($video_sedikit as $vids)
                        <div class="timeline timeline-m mt-3">
                            <div class="timeline-item bg-light">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-indicator"><i
                                            class="material-icons">play_circle_filled</i></div>
                                </div>
                                <div class="timeline-item-content">{{ $vids->nama_video }}</div>
                            </div>
                        </div>
                        @endforeach
                        <div class="timeline timeline-m mt-3">
                            <div class="timeline-item bg-light">
                                <div class="timeline-item-marker">
                                    <div class="timeline-item-marker-indicator"><i
                                            class="material-icons">play_circle_filled</i></div>
                                </div>
                                <div class="timeline-item-content">{{ $count_video }} Video Lainnya</div>
                            </div>
                        </div>
                    </div>
                    <a type="button" class="btn btn-primary p-3 text-white" style="background-color: blue">Gabung Kelas</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <div class="container mb-4">
            <div class="mb-5">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item right-3" role="presentation">
                        <button class="nav-link p-3 active" id="pills-kelas-tab" data-bs-toggle="pill"  
                            data-bs-target="#pills-kelas" type="button" role="tab" aria-controls="pills-kelas"
                            aria-selected="true" style="border-radius: 40px;width:150px;">Tentang Kelas</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link p-3" id="pills-lesson-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-lesson" type="button" role="tab" aria-controls="pills-lesson"
                            aria-selected="false" style="border-radius: 40px;width:150px">Lesson</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link p-3" id="pills-review-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-review" type="button" role="tab" aria-controls="pills-review"
                            aria-selected="false" style="border-radius: 40px;width:150px">Review Kelas</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link p-3" id="pills-portofolio-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-portofolio" type="button" role="tab" aria-controls="pills-portofolio"
                            aria-selected="false" style="border-radius: 40px;width:150px">Portofolio</button>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-kelas" role="tabpanel"
                    aria-labelledby="pills-kelas-tab">
                    <div class="container">
                        <div class="col-lg-12 col-12">
                            <div class="row">
                                <div class="col-lg-8 col-12">
                                    <div class="item-bootcamp">
                                        <h1 class="package text-black">
                                            Develop Your Skill
                                        </h1>
                                        <p class="description" style="text-align: justify">
                                            {{ $kelas->tentang_kelas }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="container">
                            <div class="col-lg-12 col-12">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="item-bootcamp">
                                            <h1 class="package text-black">
                                                Keypoint atau Modul
                                            </h1>
                                            <div class="mt-3">
                                                <div class="row">
                                                    @forelse ($kelas->Detailkeypoint as $item)
                                                    <div class="col-6">
                                                        <p class="mt-2">
                                                            <img src="https://buildwithangga.com/themes/front/images/ic_check_blue.svg"
                                                                alt="">
                                                            {{ $item->nama_keypoint }}
                                                        </p>
                                                    </div>

                                                    @empty

                                                    @endforelse
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="container">
                            <div class="col-lg-12 col-12">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="item-bootcamp">
                                            <h1 class="package text-black">
                                                Designed For
                                            </h1>
                                            <div class="mt-3">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p class="mt-2">
                                                            <img src="https://buildwithangga.com/themes/front/images/ic_check_blue.svg"
                                                                alt="">
                                                            <span style="line-height: 28px">Bagi yang ingin membangun
                                                                portfolio</span>
                                                        </p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="mt-2">

                                                            <img src="https://buildwithangga.com/themes/front/images/ic_check_blue.svg"
                                                                alt="">


                                                            <span style="line-height: 28px">Bagi yang ingin belajar
                                                                melamar pekerjaan</span>
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 mb-5">
                        <div class="container">
                            <div class="col-lg-12 col-12">
                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="item-bootcamp">
                                            <h1 class="package text-black">
                                                Learn With Expert
                                            </h1>
                                            <div class="mt-3">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="card border-0">
                                                            <div class="card-body text-center">
                                                                <p class="mt-2">
                                                                    <img class="img-account-profile rounded-circle mb-2"
                                                                        src="{{ asset('/image/'.$kelas->Detailmentor->User['avatar']) }}"
                                                                        alt="">
                                                                </p>
                                                                <div class="support">
                                                                    <img
                                                                        src="https://buildwithangga.com/themes/front/images/ic_star.svg">
                                                                    <img
                                                                        src="https://buildwithangga.com/themes/front/images/ic_star.svg">
                                                                    <img
                                                                        src="https://buildwithangga.com/themes/front/images/ic_star.svg">
                                                                    <img
                                                                        src="https://buildwithangga.com/themes/front/images/ic_star.svg">
                                                                    <img
                                                                        src="https://buildwithangga.com/themes/front/images/ic_star.svg">
                                                                </div>
                                                                <div class="mt-4">
                                                                    <h6><b>{{ $kelas->Detailmentor->User->name }} </b>
                                                                    </h6>
                                                                    <p style="color: grey">
                                                                        {{ $kelas->Jeniskelas->jenis_kelas }}</p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="center-item">
                            <div class="col-8">
                                <div class="text-center mb-4">
                                    <h4>
                                        <span class="badge bdage-s badge-primary small">#BeyondPremium</span>
                                    </h4>

                                    <h2 class="mt-5"><b>Start to Invest 100%</b></h2>
                                    <div class="row justify-content-md-center mt-4">
                                        <div class="col-6 ">
                                            <p>
                                                Langkah yang tepat untuk berinvestasi kepada ilmu pengetahuan yang baru di
                                                berbagai bidang
                                            </p>
                                            </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-4">
                                        <div class="card p-4 border-0">
                                            <div class="card-body">
                                                <p class="mt-2">
                                                    <img src="https://buildwithangga.com/themes/front/images/ic_review.svg"
                                                        class="icon" width="100" height="100">
                                                </p>
                                                <p style="margin: 1px">
                                                    Selamanya
                                                </p>
                                                <h4>
                                                    <b>Rp. {{ number_format($kelas->harga_kelas) }}</b>

                                                </h4>
                                                <div class="col-10">
                                                    <p class="mt-1" class="small" style="color: gray" >
                                                        Miliki kelas Premium secara permanen dan bangun sebuah projek
                                                        nyata
                                                    </p>
                                                </div>
                                                <div class="col-10">
                                                    <hr>
                                                </div>
                                                <p class="mt-4">
                                                    <img src="https://buildwithangga.com/themes/front/images/ic_check_blue.svg"
                                                        alt="">
                                                    Akses kelas selamanya
                                                </p>
                                                <p class="mt-2">
                                                    <img src="https://buildwithangga.com/themes/front/images/ic_check_blue.svg"
                                                        alt="">
                                                    Assets & group konsultasi
                                                </p>
                                                <p class="mt-2">
                                                    <img src="https://buildwithangga.com/themes/front/images/ic_check_blue.svg"
                                                        alt="">
                                                        Tools pendukung belajar
                                                </p>
                                                <p class="mt-2">
                                                    <img src="https://buildwithangga.com/themes/front/images/ic_check_blue.svg"
                                                        alt="">
                                                        Sertifikat kelulusan
                                                </p>
                                                <p class="mt-2">
                                                    <img src="https://buildwithangga.com/themes/front/images/ic_check_blue.svg"
                                                        alt="">
                                                        Free update materi
                                                </p>
                                                <p class="mt-2">
                                                    <img src="https://buildwithangga.com/themes/front/images/ic_check_blue.svg"
                                                        alt="">
                                                        Lowongan pekerjaan
                                                </p>
                                               
                                            </div>
                                            <a type="button" class="btn btn-primary text-white " style="background-color: blue">Beli Kelas</a>
                                            <a href="{{ route('program-kelas.index') }}" class="btn btn-master btn-secondary mt-4">Lihat Catalog Lain</a>
                                        </div>
                                      

                                    </div>
                                    <div class="col-6 mt-4">
                                        <div class="card p-4 border-0">
                                            <div class="card-body">
                                                <p class="mt-2">
                                                    <img src="https://buildwithangga.com/themes/front/images/ic_flag.svg" class="icon" width="100" height="100">
                                                </p>
                                                <p style="margin: 1px">
                                                    Tempat Lain
                                                </p>
                                                <h4>
                                                    <b>Rp. Mahal</b>

                                                </h4>
                                                <div class="col-10">
                                                    <p class="mt-1" class="small" style="color: gray" >
                                                        Kelas tidak terstuktur dan tidak ada projek langsung
                                                    </p>
                                                </div>
                                                <div class="col-10">
                                                    <hr>
                                                </div>
                                                <p class="mt-4">
                                                    <span class="material-icons">
                                                        close
                                                        </span>
                                                    Akses kelas Bulanan
                                                </p>
                                                <p class="mt-2">
                                                    <span class="material-icons">
                                                        close
                                                        </span>
                                                    Harga Relative Mahal
                                                </p>
                                                <p class="mt-2">
                                                    <span class="material-icons">
                                                        close
                                                        </span>
                                                    Tidak didukung tools
                                                </p>
                                                <p class="mt-2">
                                                    <span class="material-icons">
                                                        close
                                                        </span>
                                                    Kelas tidak terstuktur
                                                </p>
                                                <p class="mt-2">
                                                    <span class="material-icons">
                                                        close
                                                        </span>
                                                    Tidak ada update materi
                                                </p>
                                               
                                            </div>
                                            <a href="{{ route('program-kelas.index') }}" class="btn btn-master btn-secondary mt-4">Lihat Catalog Lain</a>
                                        </div>
                                      

                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="card p-2 border-0">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-2">
                                                    <p class="mt-2">
                                                        <img src="https://buildwithangga.com/themes/front/images/ic_sekali_bayar.svg" class="icon" width="70" height="70">
                                                        
                                                    </p>
                                                </div>
                                                <div class="col-6 text-left">
                                                    <h6><b>Jaminan Uang Kembali</b></h6> 
                                                    <p>
                                                        Tidak perlu khawatir untuk mulai berinvestasi karena Anda bisa melakukan refund
                                                    </p>
                                                </div>
                                                <div class="col-4">
                                                    <a href="{{ route('program-kelas.index') }}" class="btn btn-master btn-secondary mt-4" style="float: right">Pelajari</a>
                                                </div>
                                            </div>
                                           
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="pills-lesson" role="tabpanel" aria-labelledby="pills-lesson-tab">
                    <div class="container">
                        <div class="col-lg-12 col-12">
                            <div class="row">
                                <div class="col-lg-8 col-12">
                                    <div class="item-bootcamp">
                                        <h1 class="package text-black">
                                            Happy Learning
                                        </h1>
                                        <p class="description">
                                            Materi kelas yang bermanfaat untuk karir kita
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">3
                </div>
                <div class="tab-pane fade" id="pills-portofolio" role="tabpanel" aria-labelledby="pills-portofolio-tab">
                    4</div>
            </div>

        </div>
    </div>



</section>








@endsection
