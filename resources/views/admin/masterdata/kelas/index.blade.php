@extends('layouts.Admin.adminlayout')

@section('content')

<main>
    <div class="container-fluid mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Master Data Kelas</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">{{ $today }}</span>
                    · Tanggal {{ $tanggal }} · <span id="clock"> 12:16 PM</span>
                </div>
            </div>
            <div class="small">
                <span class="font-weight-500 text-primary">Master Data</span>
                <hr></hr>
            </div>
        </div>
    </div>


    {{-- MAIN PAGE CONTENT --}}

    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">List Kelas
                    <a href="{{ route('kelas.create') }}" class="btn btn-sm btn-primary" type="button">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <div class="datatable">
                    @if(session('messagelaunch'))
                    <div class="alert alert-primary" role="alert"> <i class="fas fa-check"></i>
                        {{ session('messagelaunch') }}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
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
                                                style="width: 150px;">Nama Kelas</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 50px;">Jenis Kelas</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 50px;">Harga Kelas</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">Mentor</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">Status Video</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Launching Kelas</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($kelas as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>{{ $item->nama_kelas }}</td>
                                            <td>{{ $item->Jeniskelas->jenis_kelas }}</td>
                                            <td>Rp. {{ number_format($item->harga_kelas) }}</td>
                                            <td>
                                                {{ $item->name }}
                                            </td>
                                            <td class="text-center">
                                                @if ($item->status == 'Aktif')
                                                    <span class="badge badge-success ">Aktif</span>
                                                @else
                                                    <span class="badge badge-danger">Tidak Aktif</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($item->status_video == 'Telah Dibuat')
                                                    <span class="badge badge-success ">Telah Dibuat</span>
                                                @else
                                                    <span class="badge badge-danger">Belum Dibuat</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($item->status_video == 'Belum Dibuat' && $item->status_approval_video == 'Pending' && $item->status == 'Tidak Aktif')
                                                    <span class="badge badge-warning ">Segera Selesaikan Video!</span>
                                                @elseif ($item->status_video == 'Telah Dibuat' && $item->status_approval_video == 'Pending' && $item->status == 'Tidak Aktif')
                                                    <span class="badge badge-warning ">Cek Menu Approval untuk Approve Video</span>
                                                @elseif ($item->status_video == 'Telah Dibuat' && $item->status_approval_video == 'Disetujui' && $item->status == 'Tidak Aktif')
                                                <a href="" class="btn-xs btn-primary" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modallaunching-{{ $item->id_kelas }}">
                                                    <i class="fas fa-rocket mr-1"></i>Launch
                                                </a>
                                                @elseif ($item->status_video == 'Telah Dibuat' && $item->status_approval_video == 'Ditolak' && $item->status == 'Tidak Aktif')
                                                    <span class="badge badge-danger ">Menunggu Pembenaran Video!</span>
                                                @elseif ($item->status_video == 'Telah Dibuat' && $item->status_approval_video == 'Disetujui' && $item->status == 'Aktif')
                                                    <span class="badge badge-success ">Kelas Telah Launching!</span>
                                                @endif
                                               
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('kelas.show', $item->id_kelas) }}"
                                                    class="btn btn-secondary btn-datatable" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Detail">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('kelas.edit', $item->id_kelas) }}" class="btn btn-primary btn-datatable" type="button">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-datatable" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modalhapus-{{ $item->id_kelas }}">
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
</main>

@forelse ($kelas as $item)
<div class="modal fade" id="Modallaunching-{{ $item->id_kelas }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Launching Kelas</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('launch-kelas', $item->id_kelas) }}" method="POST" class="d-inline">
                @csrf
                <div class="modal-body">
                    <div class="form-group">Apakah Anda Yakin Posting dan Launching Kelas <b>{{ $item->nama_kelas }}</b>  dengan harga <b> {{ number_format($item->harga_kelas) }}</b>?</div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Ya! Launch</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty
@endforelse


@forelse ($kelas as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_kelas }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('kelas.destroy', $item->id_kelas) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body">Apakah Anda Yakin Menghapus Data Master Kelas {{ $item->nama_kelas }} ?</div>
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