@extends('layouts.UserDashboard.userdashlayout')

@section('content')
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            Hasil Karya Saya
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
        <div class="row">
            <div class="col-lg-4">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                   
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;" src="{{ asset('images/porto.png') }}" alt="">
                        </div>
                        <div class=" m-0 font-weight-bold text-primary" style="text-align: center">Tambah Hasil Karya
                        </div>
                        <hr class="my-2">
                        <p class="small" style="text-align: center">Anda ingin menambahkan memamerkan hasil karya Anda?
                            klik tombol <b>Tambah Karya</b>. </p>
                        <div class="text-center">
                            <a class="btn btn-sm btn-primary" href="{{ route('portofolio-saya.create') }}">
                                Tambah Karya
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right ml-1">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="datatable">
                            @if(session('messageberhasil'))
                            <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                                {{ session('messageberhasil') }}
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            @endif
                            @if(session('messagehapus'))
                            <div class="alert alert-danger" role="alert"> <i class="fas fa-check"></i>
                                {{ session('messagehapus') }}
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            @endif
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-hover dataTable" id="dataTable" width="100%"
                                            cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                        colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 20px;">No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 80px;">Jenis Project</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 100px;">Nama Project</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 30px;">url project</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                                        style="width: 50px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($porto as $item)
                                                <tr role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                                    <td>{{ $item->Kelas->Jeniskelas->jenis_kelas }}</td>
                                                    <td>{{ $item->nama_project }}</td>
                                                    <td>{{ $item->url_project }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('portofolio-saya.show', $item->id_portofolio) }}"
                                                            class="btn btn-secondary btn-datatable" data-toggle="tooltip"
                                                            data-placement="top" title="" data-original-title="Detail">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('portofolio-saya.edit', $item->id_portofolio) }}" class="btn btn-primary btn-datatable" type="button">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="" class="btn btn-danger btn-datatable" type="button"
                                                            data-toggle="modal"
                                                            data-target="#Modalhapus-{{ $item->id_portofolio }}">
                                                        <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @empty
        
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@forelse ($porto as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_portofolio }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('portofolio-saya.destroy', $item->id_portofolio) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body">Apakah Anda Yakin Menghapus Data Portofolio {{ $item->nama_project }} ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit">Ya! Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse

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
