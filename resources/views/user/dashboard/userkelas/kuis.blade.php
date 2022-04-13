@extends('layouts.UserDashboard.userdashlayout')

@section('content')
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            Kuis Pembelajaran!
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
                    <li class="breadcrumb-item"><a href="{{ route('kelas-saya.index') }}">{{ $kelas->nama_kelas }}</a>
                    </li>
                    <li class="breadcrumb-item active">Kuis Kelas</li>
                </ol>
            </div>
        </div>
    </header>

    <div class="container-fluid mt-n10">
        <form action="{{ route('kelas-saya-kirim-jawaban', $kelas->id_kelas) }}" id="form1" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-4">
                    <div class="card card-scrollable mt-2">
                        <div class="card-header">Kuis Kelas</div>
                        <div class="card-body">
                            <div class="text-center">
                                <div class=" m-0 font-weight-bold text-primary" style="text-align: center">Kuis Kelas
                                    {{ $kelas->nama_kelas }}
                                </div>
                                <hr class="my-2">
                                <p class="small" style="text-align: center">Jawablah pertanyaan berikut dengan benar,
                                    <br> Kuis ini ditujukan untuk mengukur kemampuan member <br>setelah mengikuti
                                    pembelajaran kelas. </p>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-2">
                        {{-- <div class="card-header  bg-primary-soft">Selesai Belajar</div> --}}
                        <div class="card-body text-center">
                            <a href="{{ route('kelas-saya.index') }}" class="btn btn-primary" type="button">Kirim Jawaban</a>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card mt-2 p-4" style="border-radius: 30px">
                        <div class="card-body">
                            <p>Soal Kuis, Pilihlah salah satu jawaban yang benar</p>
                            <tbody id="tes">
                                @forelse ($kuis as $item)
                                <div class="form-group mt-4">
                                    <b>{{ $loop->iteration }}.</b> {{ $item->soal_kuis }}
                                </div>
                                <input style="display: none" class="form-control" type="text" name="id_kuis"
                                    id="id_kuis" value="{{ $item->id_kuis }}" readonly>
                                <input style="display: none" class="form-control" type="text" name="jawaban"
                                    id="jawaban-{{ $item->id_kuis }}" value="{{ $item->jawaban }}" readonly>
                                <div class="mr-4">
                                    <div class="row" id="radio1">
                                        <div class="col-6 mb-1">
                                            <div class="form-check">
                                                <input class="mr-1 checktes" value="{{ $item->option_a }}" type="radio"
                                                    name="radio2-{{ $item->id_kuis }}">{{ $item->option_a }}
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="mr-1 checktes" value="{{ $item->option_b }}" type="radio"
                                                    name="radio2-{{ $item->id_kuis }}">{{ $item->option_b }}
                                            </div>
                                        </div>
                                        <div class="col-6 mb-1">
                                            <div class="form-check">
                                                <input class="mr-1 checktes" value="{{ $item->option_c }}" type="radio"
                                                    name="radio2-{{ $item->id_kuis }}">{{ $item->option_c }}
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="mr-1 checktes" value="{{ $item->option_d }}" type="radio"
                                                    name="radio2-{{ $item->id_kuis }}">{{ $item->option_d }}
                                            </div>
                                        </div>
                                    </div>

                                    @empty

                                    @endforelse
                                </div>
                            </tbody>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>


<script>
    function kirimjawaban(event, id_kelas) {
        var _token = $('#form1').find('input[name="_token"]').val()
        var tbody = $('#tes')
     
        // var tunjangan = 0
        var check = tbody.find('.checktes').each(function (index, element) {
            var value = $(element).is(':checked')
            console.log(check)
            // if (value == true) {
            //     var tr = $(element).parent().parent().parent()
            //     var td = $(tr).find('.jumlah_tunjangan')[0]
            //     var jumlah = $(td).html()
            //     var splitjumlah = jumlah.split('Rp')[1].replace('.', '').replace('.', '').replace(',00', '')
            //         .trim()

            //     tunjangan = tunjangan + parseInt(splitjumlah)
            // }
        })



        // var radio = $(`#radio1-${id_kuis}`).find("input[name='radio2']:checked").val()
    }




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
