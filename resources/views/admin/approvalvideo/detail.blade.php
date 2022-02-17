@extends('layouts.Admin.adminlayout')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon" style="color: white"><i class="fas fa-list"></i>
                            </div>
                            <div class="page-header-subtitle" style="color: white">Kelas {{ $kelas->nama_kelas }}</div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Video</span>
                            · Modul · Detail
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('approval-video.index') }}"
                            class="btn btn-sm btn-light text-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid mt-n10">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card card-header-actions">
                        <div class="card-header ">Detail Kelas
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" id="form1" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="kode_kelas">Kode Kelas</label>
                                    <input class="form-control" id="kode_kelas" type="text" name="kode_kelas"
                                        value="{{ $kelas->kode_kelas }}" readonly />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="id_jenis_kelas">Jenis Kelas</label>
                                    <input class="form-control" id="id_jenis_kelas" type="text" name="id_jenis_kelas"
                                        value="{{ $kelas->Jeniskelas->jenis_kelas }}" readonly />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="nama_kelas">Nama Kelas</label>
                                <textarea class="form-control" id="nama_kelas" type="text" name="nama_kelas" value="{{ $kelas->nama_kelas }}"
                                    readonly>{{ $kelas->nama_kelas }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="small mb-1" for="name">Mentor</label>
                                        <input class="form-control" id="name" type="text" name="name" value="{{ $kelas->name }}"readonly />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        @if ($kelas->status_approval_video == 'Disetujui')
                                            <i class="fas fa-check-square mr-1"></i>
                                        @else
                                            <i class="fas fa-times-circle mr-1"></i>
                                        @endif
                                        <label class="small mb-1" for="name">Status Approval</label>
                                        <input class="form-control" id="name" type="text" name="name" value="{{ $kelas->status_approval_video }}"readonly />
                                    </div>
                                </div>

                            </div>
                           
                            <div class="form-group text-right">
                                <hr>
                                <a href="{{ route('approval-video.index') }}" class="btn btn-sm btn-light">Kembali</a>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-waves mb-4">
                    <div class="card-body p-5">
                        <div class="row align-items-center justify-content-between">
                            <div class="col">
                                <h2 class="text-primary">Video dan Modul Kelas</h2>
                                <p class="text-gray-700">Mohon dilakukan pengecekan terhadap <b>Video</b> dan <b>Modul/Keypoint</b> 
                                    yang telah disusun oleh mentor {{ $kelas->name }} pada kelas {{ $kelas->nama_kelas }}
                                </p>
                                <a href="" class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                                    data-target="#Modalkeypoint">
                                    Lihat Modul
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-arrow-right ml-1">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg>
                                </a>
                            </div>
                            <div class="col d-none d-lg-block mt-xxl-n5"><img class="img-fluid px-xl-4 mt-xxl-n6"
                                    style="width: 23rem;" src="/images/video-youtube.png"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">
                    List Video Kelas
                </div>
                <div class="card-body">
                    <div class="datatable">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover dataTable" id="dataTablekonfirmasi"
                                        width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 20px;">
                                                    No</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 80px;">
                                                    Modul</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 70px;">
                                                    Nama Video</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 150px;">
                                                    Url Video</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 150px;">
                                                    Keterangan Video</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 120px;">
                                                    Lihat Video</th>
                                            </tr>
                                        </thead>
                                        <tbody id='konfirmasi'>
                                            @forelse ($kelas->Detailvideo as $item)
                                            <tr role="row" class="odd">
                                                <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                                <td>{{ $item->Keypoint->nama_keypoint }}</td>
                                                <td>{{ $item->nama_video }}</td>
                                                <td>{{ $item->url_video }}</td>
                                                <td>{{ $item->keterangan_video }}</td>
                                                <td class="text-center">
                                                    <a href="" class="btn-xs btn-secondary" type="button"
                                                        data-toggle="modal"
                                                        data-target="#Modalvideo-{{ $item->id_video_kelas }}">
                                                        <i class="fab fa-youtube"></i> Lihat Video
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
    </form>
</main>

<div class="modal fade" id="Modalkeypoint" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-light ">
                <h5 class="modal-title">List Modul Pembelajaran</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="datatable">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="dataTableKeypoint"
                                    width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                    style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">
                                                No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 50px;">Urutan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 140px;">Keypoint</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($kelas->Detailkeypoint as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td class="text-center">{{ $item->number }}</td>
                                            <td class="text-center">{{ $item->nama_keypoint }}</td>
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

@forelse ($kelas->Detailvideo as $item)
<div class="modal fade" id="Modalvideo-{{ $item->id_video_kelas }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Nama Video: {{ $item->nama_video }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="closetambahpajak"><span
                        aria-hidden="true">×</span></button>
            </div>
                <div class="modal-body">
                    <x-embed url="{{ $item->url_video }}" />
                <div class="mt-5">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="small mb-1" for="nama_kelas">Nama Video</label>
                                <input class="form-control" id="nama_kelas" type="text" name="nama_kelas" value="{{ $item->nama_video }}" readonly />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="small mb-1" for="nama_kelas">Keterangan Video</label>
                                <textarea class="form-control" id="nama_kelas" type="text" name="nama_kelas"
                                    readonly>{{ $item->keterangan_video }}</textarea>
                            </div> 
                        </div>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Kembali</button>
                </div>
        </div>
    </div>
</div>
@empty
    
@endforelse




<script>

    $(document).ready(function () {
        $('#dataTableKeypoint').DataTable();
        $('#dataTablekonfirmasi').DataTable();
    });

</script>

@endsection
