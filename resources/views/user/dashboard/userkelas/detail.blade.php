@extends('layouts.UserDashboard.userdashlayout')

@section('content')
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            Selamat Belajar!
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">{{ $today }}</span>
                            · Tanggal {{ $tanggal_tahun }} · <span id="clock">12:16 PM</span>
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <div class="small">
                            Hi! {{ Auth::user()->name }}
                            <hr>
                            </hr>
                        </div>
                    </div>
                </div>
                <ol class="breadcrumb mb-0 mt-4">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('kelas-saya.index') }}">Kelas Saya</a></li>
                    <li class="breadcrumb-item active">{{ $kelas->nama_kelas }}</li>
                </ol>
            </div>
        </div>
    </header>

    <div class="container-fluid mt-n10">
        <div class="row">
            <div class="col-4">
                @forelse ($kelas->Detailkeypoint as $item)
                <div class="card card-scrollable mt-2">
                    <div class="card-header">Modul {{ $loop->iteration}}. {{ $item->nama_keypoint }}</div>
                    <div class="card-body">
                        @forelse ($item->Video as $vid)
                        <div class="text-center">
                            <a class="btn btn-primary btn-xs btn-icon mr-2 my-1" href="{{ route('kelas-saya-video', $vid->id_video_kelas) }}"><i class="fas fa-video"></i></a>
                            <a class="btn btn-sm btn-light mr-2 my-1" href="{{ route('kelas-saya-video', $vid->id_video_kelas) }}" style="width: 300px">{{ $loop->iteration}}. {{ $vid->nama_video }}</a>
                        </div>
                         
                        @empty

                        @endforelse
                    </div>
                </div>
                @empty

                @endforelse
                <div class="card mt-2">
                    {{-- <div class="card-header  bg-primary-soft">Selesai Belajar</div> --}}
                    <div class="card-body text-center">
                        <a href="" class="btn btn-primary mr-2 my-1 lift" data-toggle="modal" type="button"
                        data-target="#Modalselesai" >Selesai Kelas</a>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card mt-2" style="border-radius: 40px">
                    <img class="img-fluid mb-4" src="{{ asset('/image/'.$kelas['cover_kelas']) }}" alt="" style="border-radius: 40px">
                </div>
                <div class="col-4 mt-4">
                    <div class="card border-0">
                        <div class="card-body text-center">
                            <p>Mentor</p>
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
</main>


<div class="modal fade" id="Modalselesai" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Selesai Kelas</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('kelas-saya-selesai', $kelas->id_kelas) }}" method="POST" class="d-inline">
                @csrf
                <div class="modal-body">Apakah Anda Yakin Sudah Menyelesaikan Kelas {{ $kelas->nama_kelas }} ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Ya! Sudah</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    setInterval(displayclock, 500);

    function displayclock() {
        var time = new Date()
        var hrs = time.getHours()
        var min = time.getMinutes()
        var sec = time.getSeconds()
        var en = 'AM';

        if (hrs > 12) {
            en = 'PM'
        }

        if (hrs > 12) {
            hrs = hrs - 12;
        }

        if (hrs == 0) {
            hrs = 12;
        }

        if (hrs < 10) {
            hrs = '0' + hrs;
        }

        if (min < 10) {
            min = '0' + min;
        }

        if (sec < 10) {
            sec = '0' + sec;
        }

        document.getElementById('clock').innerHTML = hrs + ':' + min + ':' + sec + ' ' + en;
    }

</script>

@endsection
