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

    <div class="container-fluid col-8 mt-n10">
        <form action="{{ route('kelas-saya-kirim-jawaban', $kelas->id_kelas) }}" id="form1" method="POST"
            enctype="multipart/form-data">
            @csrf

            <div class="card card-scrollable mt-2" style="border-radius: 30px">
                <div class="card-body">
                    <div class="text-center">
                        <div class=" m-0 font-weight-bold text-primary" style="text-align: center">Kuis Kelas
                            {{ $kelas->nama_kelas }}
                        </div>
                        <hr class="my-2">
                        <p class="small" style="text-align: center"> Kuis ini ditujukan untuk mengukur kemampuan member
                            setelah mengikuti
                            pembelajaran kelas, jawablah pertanyaan berikut dengan benar.
                            <br class="small">Jumlah Soal pada kuis ini yakni <b id="jumlah_soal">{{ $count_kuis }}</b> Soal, Setiap soal
                            terjawab benar bernilai 10 Poin</br>
                        </p>
                    </div>
                </div>
            </div>



            <div id="kuis">
                @forelse ($kuis as $item)
                <div class="card mt-2 p-2" style="border-radius: 30px">
                    <div class="card-body">

                        <form action="{{ route('kelas-saya-kirim-jawaban', $item->Kelas->id_kelas) }}" method="POST"
                            id="form2-{{ $item->id_kuis }}" class="d-inline">
                            @csrf
                            <div class="form-group mt-4">
                                <b>{{ $loop->iteration }}.</b> {{ $item->soal_kuis }}
                            </div>
                            <div class="form-group col-8">
                                <input class="form-control" type="text" name="jawaban" id="jawaban"
                                    value="{{ $item->jawaban }}" style="display: none" readonly>
                            </div>

                            <div class="row col-8" id="radio1-{{ $item->id_pegawai }}">
                                <div class="col-md-6 mt-2">
                                    <input class="mr-1 small" value="option_a" type="radio" name="radio2"><span
                                        class="small">{{ $item->option_a }}</span>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <input class="mr-1 small" value="option_b" type="radio" name="radio2"><span
                                        class="small">{{ $item->option_b }}</span>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <input class="mr-1 small" value="option_c" type="radio" name="radio2"><span
                                        class="small">{{ $item->option_c }}</span>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <input class="mr-1 small" value="option_d" type="radio" name="radio2"><span
                                        class="small">{{ $item->option_d }}</span>
                                </div>
                            </div>



                            {{-- <div class="form-group col-8">
                                <select name="option" class="form-control">
                                    <option>Pilih Jawaban</option>
                                    <option value="option_a">{{ $item->option_a }}</option>
                            <option value="option_b">{{ $item->option_b }}</option>
                            <option value="option_c">{{ $item->option_c }}</option>
                            <option value="option_d">{{ $item->option_d }}</option>
                            </select>
                    </div> --}}
        </form>
    </div>
    </div>
    @empty

    @endforelse

    </div>



    <div class="mt-4 text-center">

        <a href="" class="btn btn-primary" data-toggle="modal" type="button" data-target="#Modalsumbit"  style="border-radius: 30px">Kirim
            Jawaban</a>

    </div>

    </form>
    </div>
</main>

<div class="modal fade" id="Modalsumbit" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success-soft">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Simpan Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group text-center">Apakah Anda Telah Selesai Mengerjakan Kuis?</div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button" onclick="kirimjawaban(event, {{ $kelas->id_kelas }})">Ya
                    Sudah!</button>
            </div>
        </div>
    </div>
</div>


<script>
    function kirimjawaban(event, id_kelas) {
        event.preventDefault()
        var _token = $('#form1').find('input[name="_token"]').val()
        var nilai = 0;
        var jumlah_soal = $('#jumlah_soal').html()
        var poin_soal = jumlah_soal * 10
        var minimal = poin_soal - 20;

        var datakuis = $('#kuis').children()
        for (let index = 0; index < datakuis.length; index++) {
            var form = $(datakuis[index])
            var jawaban = form.find('input[name="jawaban"]').val()
            var option = form.find('input[name="radio2"]:checked').val()
            console.log(option, jawaban)
            if (option == undefined | option == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Anda Belum Menjawab Soal',
                    timer: 2000,
                    timerProgressBar: true,
                })
            } else {
                if (option === jawaban) {
                    var nilai = parseInt(nilai) + 10;
                } else {
                    var nilai = nilai + 0;
                }

            }
        }

        if (option == undefined | option == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Anda Belum Menjawab Soal',
                timer: 2000,
                timerProgressBar: true,
            })
        } else {
            var sweet_loader =
                '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';


            var data = {
                _token: _token,
                id_kelas: id_kelas,
                nilai: nilai,
                poin_soal: poin_soal,
                minimal: minimal
            }



            $.ajax({
                method: 'post',
                url: '/user/kelas/' + id_kelas + '/kuis',
                data: data,
                beforeSend: function () {
                    swal.fire({
                        title: 'Mohon Tunggu!',
                        html: 'Data Kuis Sedang Diproses...',
                        showConfirmButton: false,
                        onRender: function () {
                            $('.swal2-content').prepend(sweet_loader);
                        }
                    });
                },
                success: function (response) {
                    swal.fire({
                        icon: 'success',
                        showConfirmButton: false,
                        html: '<h5>Success!</h5>'
                    });

                    if (nilai >= minimal) {
                        window.location.href = '/user/kelas/' + id_kelas + '/finishclass'
                    } else {
                        window.location.href = '/user/kelas/' + id_kelas + '/gagalkuis'
                    }
                },
                error: function (response) {
                    console.log(response)
                    swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: response
                    });
                }
            });
        }



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
