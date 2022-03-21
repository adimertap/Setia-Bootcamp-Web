@extends('layouts.UserDashboard.userdashlayout')

@section('content')
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            Dashboard User {{ Auth::user()->name }}
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
            </div>

        </div>
    </header>

    <div class="container-fluid mt-n10">
        <div class="card card-waves mb-4">
            <div class="card-body p-5">
                <div class="row align-items-center justify-content-between">
                    <div class="col">
                        <h2 class="text-primary">Selamat Datang, {{ Auth::user()->name}}!</h2>
                        <p class="text-gray-700">Upgrade terus ilmu dan pengalaman
                            terbaru kamu di bidang teknologi, Yuk mulai Belajar!
                        </p>
                        <a class="btn btn-primary btn-sm px-3 py-2" href="{{ route('kelas-saya.index') }}">
                            Get Started
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-arrow-right ml-1">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                    <div class="col d-none d-lg-block mt-xxl-n5"><img class="img-fluid px-xl-4 mt-xxl-n6"
                            style="width: 23rem;" src="{{asset('images/Hello.png')}}"></div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <!-- Dashboard info widget 1-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-primary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-primary mb-1">Seluruh Kelas Saya</div>
                                <div class="h6">Total: {{ $semua }}</div>
                            </div>
                            <div class="ml-2"><i class="fas fa-cubes" style="color: gainsboro"></i> </svg>
                            </div>

                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <!-- Dashboard info widget 2-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-secondary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-secondary mb-1">Kelas Saya Unfinished</div>
                                <div class="h6">Total: {{ $unfinish }}</div>
                            </div>
                            <div class="ml-2"><i class="fas fa-shopping-cart" style="color: gainsboro"></i>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <!-- Dashboard info widget 4-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-info mb-1">Kelas Saya Finished</div>
                                <div class="h6">Total: {{ $finish }}</div>
                            </div>
                            <div class="ml-2"><i class="fas fa-box-open" style="color: gainsboro"></i>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <!-- Dashboard info widget 3-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-success h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-success mb-1">Transaksi</div>
                                <div class="h6">Total: {{ $checkout }}</div>
                            </div>
                            <div class="ml-2"><i class="fas fa-truck-loading" style="color: gainsboro"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
