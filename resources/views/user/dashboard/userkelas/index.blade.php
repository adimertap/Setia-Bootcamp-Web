@extends('layouts.UserDashboard.userdashlayout')

@section('content')
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            Kelas Saya
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
                    <li class="breadcrumb-item active">Kelas Saya</li>
                </ol>
                <div>
                    @include('components.alert')
                    @if(session('messageberhasil'))
                    <div class="alert alert-success mt-3" role="alert"> <i class="fas fa-check"></i>
                        {{ session('messageberhasil') }}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                </div>
               
            </div>
        </div>
    </header>

    <div class="container-fluid mt-n10">
        <div class="row">
            @forelse ($kelas as $item)
            <div class="col-3">
                <div class="card lift h-100" href="{{ route('kelas-saya.show', $item->id_kelas) }}" style="border-radius: 30px">
                    <div class="card-body text-center   ">
                        <img class="img-fluid mb-4" src="{{ asset('/image/'.$item->Kelas['cover_kelas']) }}" alt="" style="border-radius: 20px">
                        <h5>{{ $item->Kelas->Jeniskelas->jenis_kelas }} 
                            @if ($item->status_kelas == 'Progress')
                                <span class="badge badge-primary mr-2">{{ $item->status_kelas }}</span>
                            @elseif ($item->status_kelas == 'Sudah Selesai')
                                <span class="badge badge-success mr-2">{{ $item->status_kelas }}</span>
                            @endif
                        </h5>
                        <p class="mb-4">{{ $item->Kelas->nama_kelas }}</p>
                        @if ($item->status_kelas == 'Progress')
                            <a class="btn btn-sm btn-primary p-2 line-height-normal" href="{{ route('kelas-saya.show', $item->id_kelas) }}" style="border-radius: 40px">Lanjutkan Belajar</a>
                        @elseif ($item->status_kelas == 'Sudah Selesai')
                            <a class="btn btn-sm btn-primary p-2 line-height-normal" href="{{ route('kelas-saya.show', $item->id_kelas) }}" style="border-radius: 40px">Belajar Lagi</a>
                            <a class="btn btn-sm btn-secondary p-2 line-height-normal" href="{{ route('kelas-saya.show', $item->id_kelas) }}" style="border-radius: 30px">Lihat Sertifikat</a>
                            <a class="btn btn-sm btn-warning p-2 line-height-normal" href="{{ route('kelas-saya.show', $item->id_kelas) }}" style="border-radius: 30px">Beri Review</a>
                        @endif
                        
                    </div>
                </div>
            </div>
            @empty
            <div class="container-fluid">
                <div class="card card-icon">
                    <div class="row no-gutters">
                        <div class="card-icon-aside bg-primary"><i class="mr-1 text-white-50" data-feather="layers"></i></div>
                        <div class="col">
                            <div class="card-body py-5">
                                <h5 class="card-title">Warning!</h5>
                                <p class="card-text">Anda Belum Memiliki Kelas, Yuk Mulai Beli dan dapatkan Akses ke Banyak Video Pembalajaran!, <a class="font-weight-bold text-dark" href="{{ route('program-kelas.index') }}">Beli disini</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                    
            </div>
          
            @endforelse

        </div>
    </div>


</main>

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
