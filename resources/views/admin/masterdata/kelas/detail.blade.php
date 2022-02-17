@extends('layouts.Admin.adminlayout')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container-fluid mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Kelas {{ $kelas->nama_kelas }}</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">Detail</span>
                    · Kelas
                </div>
            </div>
            <div>
                <div class="col-12 col-xl-auto mb-3">
                    <a href="{{ route('kelas.index') }}" class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">Detail Kelas</div>
                <div class="card-body">
                    <div class="form-group text-center">
                        <img src="{{ asset('/image/'.$kelas['cover_kelas']) }}" alt="" style="width: 300px" />
                        <img src="{{ url($kelas->cover_kelas) }}" alt="">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="small mb-1" for="nama_kelas">Kode Kelas</label>
                                <input class="form-control form-control-sm" id="nama_kelas" type="text"
                                    name="nama_kelas" value="{{ $kelas->kode_kelas }}" readonly />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="small mb-1" for="nama_kelas">Mentor</label>
                                <input class="form-control form-control-sm" id="nama_kelas" type="text"
                                    name="nama_kelas" value="{{ $kelas->name }}" readonly />
                            </div>
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label class="small mb-1" for="nama_kelas">Nama Kelas</label>
                        <textarea class="form-control form-control-sm" id="nama_kelas" type="text"
                            name="nama_kelas" value="" readonly>{{ $kelas->nama_kelas }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="id_jenis_kelas">Jenis Kelas</label>
                        <input class="form-control form-control-sm" id="id_jenis_kelas" type="text"
                            name="id_jenis_kelas" value="{{ $kelas->Jeniskelas->jenis_kelas }}" readonly />
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="id_level">Level Kelas</label>
                            <input class="form-control form-control-sm" id="id_level" type="text"
                                name="id_level" value="{{ $kelas->level->nama_level }}" readonly />
                        </div>
                        <div class="form-group col-md-6">
                            <i class="fas fa-tags mr-1"></i>
                            <label class="small mb-1" for="harga_kelas">Harga Kelas</label>
                            <input class="form-control form-control-sm" id="harga_kelas" type="text"
                                name="harga_kelas" value="Rp. {{ number_format($kelas->harga_kelas) }}" readonly />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            @if ($kelas->status == 'Aktif')
                                <i class="fas fa-check-square mr-1"></i>
                            @else
                                <i class="fas fa-times-circle mr-1"></i>
                            @endif
                           
                            <label class="small mb-1" for="status kelas">Status Kelas</label>
                            <input class="form-control form-control-sm" id="status kelas" type="text"
                                name="status kelas" value="{{ $kelas->status }}" readonly />
                        </div>
                        <div class="form-group col-md-6">
                            @if ($kelas->status_video == 'Telah Dibuat')
                                <i class="fas fa-check-square mr-1"></i>
                            @else
                                <i class="fas fa-times-circle mr-1"></i>
                            @endif
                           
                            <label class="small mb-1" for="status kelas">Status Video</label>
                            <input class="form-control form-control-sm" id="status kelas" type="text"
                                name="status kelas" value="{{ $kelas->status_video }}" readonly />
                        </div>
                    </div>
                    <hr class="my-4" />
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header border-bottom">
                    <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="overview-tab" href="#overview" data-toggle="tab" role="tab"
                                aria-controls="overview" aria-selected="true">Tentang Kelas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="example2-tab" href="#example2" data-toggle="tab" role="tab"
                                aria-controls="example" aria-selected="false">Video Kelas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="example-tab" href="#example" data-toggle="tab" role="tab"
                                aria-controls="example" aria-selected="false">Modul Kelas</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="cardTabContent">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="alert alert-info alert-icon" role="alert">
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                                <div class="alert-icon-aside">
                                    <i class="fas fa-mobile-alt"></i>
                                </div>
                                <div class="alert-icon-content">
                                    <h5 class="alert-heading" class="small">Detail Kelas</h5>
                                    Cover Kelas, Tentang Kelas, Video Kelas
                                </div>
                            </div>
                          
                            <div class="form-group">
                            <textarea class="form-control" name="tentang_kelas" id="tentang_kelas" cols="20"
                                rows="20" readonly>{{ $kelas->tentang_kelas }}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="example" role="tabpanel" aria-labelledby="example-tab">
                            <div class="datatable">
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
                                                            style="width: 60px;">Urutan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                                            style="width: 120px;">Modul/Keypoint</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($kelas->Detailkeypoint as $item)
                                                    <tr role="row" class="odd">
                                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                                        <td>{{ $item->number }}</td>
                                                        <td>{{ $item->nama_keypoint }}</td>
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
                        <div class="tab-pane fade" id="example2" role="tabpanel" aria-labelledby="example2-tab">
                            <div class="datatable">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered table-hover dataTable" id="dataTableVideo" width="100%"
                                                cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                            colspan="1" aria-sort="ascending"
                                                            aria-label="Name: activate to sort column descending"
                                                            style="width: 20px;">No</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                                            style="width: 60px;">Modul</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                                            style="width: 60px;">Nama Video</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                                            style="width: 60px;">Url Video</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                                            style="width: 80px;">Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($kelas->Detailvideo as $item)
                                                    <tr role="row" class="odd">
                                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                                        <td>{{ $item->Keypoint->nama_keypoint }}</td>
                                                        <td>{{ $item->nama_video }}</td>
                                                        <td>{{ $item->url_video }}</td>
                                                        <td>{{ $item->keterangan_video }}</td>
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
    </div>
</div>

</main>

<script>
     $(document).ready(function () {
        $('#dataTableVideo').dataTable();
     });
</script>

@endsection
