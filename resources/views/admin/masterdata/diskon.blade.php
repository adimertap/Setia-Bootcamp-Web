@extends('layouts.Admin.adminlayout')

@section('content')

<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-database"></i></div>
                            Master Data Diskon
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- MAIN PAGE CONTENT --}}

    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">List Diskon
                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal"
                        data-target="#Modaltambah">Tambah Data</button>
                </div>
            </div>
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
                                                style="width: 60px;">Kode Diskon</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 100px;">Nama Diskon</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 90px;">Jumlah Diskon</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Jenis Diskon</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 50px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($diskon as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>{{ $item->kode_diskon }}</td>
                                            <td>{{ $item->nama_diskon }}</td>
                                            <td>{{ $item->jumlah_diskon }}%</td>
                                            <td>
                                                @if ($item->jenis_diskon == 'Diskon')
                                                <span class="badge badge-success">{{ $item->jenis_diskon }}</span>
                                                @else
                                                <span class="badge badge-warning">{{ $item->jenis_diskon }}</span>
                                                @endif
                                               
                                            </td>
                                            <td class="text-center">
                                                <a href="" class="btn btn-primary btn-datatable" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modaledit-{{ $item->id_diskon }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-datatable" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modalhapus-{{ $item->id_diskon }}">
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

<div class="modal fade" id="Modaltambah" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Diskon</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('diskon.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="kode_diskon">Kode Diskon</label><span class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control {{ $errors->has('kode_diskon') ? 'Is_invalid' : '' }}" name="kode_diskon" type="text" id="kode_diskon"
                             value="{{ old('kode_diskon') }}" placeholder="Input Kode Diskon" required/>
                        @if ($errors->has('kode_diskon'))
                            <p class="text-danger">{{ $errors->first('kode_diskon') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="nama_diskon">Nama Diskon</label><span class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control {{ $errors->has('nama_diskon') ? 'Is_invalid' : '' }}" name="nama_diskon" type="text" id="nama_diskon"
                            placeholder="Input Nama Diskon" value="{{ old('nama_diskon') }}" required/>
                        @if ($errors->has('nama_diskon'))
                            <p class="text-danger">{{ $errors->first('nama_diskon') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="jumlah_diskon">Jumlah Diskon (%)</label><span class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control {{ $errors->has('jumlah_diskon') ? 'Is_invalid' : '' }}" name="jumlah_diskon" type="number" min="1" max="100" id="jumlah_diskon"
                            placeholder="Input Jumlah Persen Diskon" value="{{ old('jumlah_diskon') }}" required/>
                        @if ($errors->has('jumlah_diskon'))
                            <p class="text-danger">{{ $errors->first('jumlah_diskon') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="description">Description</label><span class="mr-4 mb-3" style="color: red">*</span>
                        <textarea class="form-control {{ $errors->has('description') ? 'Is_invalid' : '' }}" name="description" type="text" id="description" placeholder="Input Description" 
                            value="{{ old('description') }}"></textarea>
                        @if ($errors->has('description'))
                            <p class="text-danger">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="jenis_diskon">Jenis Diskon</label><span class="mr-4 mb-3" style="color: red">*</span>
                        <select name="jenis_diskon" id="jenis_diskon" class="form-control"
                            class="form-control @error('jenis_diskon') is-invalid @enderror" required>
                            <option value="{{ old('jenis_diskon')}}"> Pilih Jenis Diskon</option>
                            <option value="Diskon">Diskon Umum</option>
                            <option value="Flash Sale">Flash Sale</option>
                        </select>
                        @error('jenis_diskon')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="Submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

@forelse ($diskon as $item)
<div class="modal fade" id="Modaledit-{{ $item->id_diskon }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Data Jenis Kelas</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('diskon.update', $item->id_diskon) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="kode_diskon">Kode Diskon</label><span class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control" name="kode_diskon" type="text" id="kode_diskon"
                             value="{{ $item->kode_diskon }}" readonly/>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="nama_diskon">Nama Diskon</label><span class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control" name="nama_diskon" type="text" id="nama_diskon"
                            placeholder="Input Nama Diskon" value="{{ $item->nama_diskon }}" required/>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="jumlah_diskon">Jumlah Diskon (%)</label><span class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control" name="jumlah_diskon" type="number" min="1" max="100" id="jumlah_diskon"
                            placeholder="Input Jumlah Persen Diskon" value="{{ $item->jumlah_diskon  }}" required/>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="jenis_diskon">Jenis Diskon</label><span class="mr-4 mb-3" style="color: red">*</span>
                        <select name="jenis_diskon" id="jenis_diskon" class="form-control"
                            class="form-control @error('jenis_diskon') is-invalid @enderror">
                            <option value="{{ $item->jenis_diskon }}"> Pilih Jenis Diskon</option>
                            <option value="Diskon">Diskon Umum</option>
                            <option value="Flash Sale">Flash Sale</option>
                        </select>
                        @error('jenis_diskon')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="Submit">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse

@forelse ($diskon as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_diskon }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('diskon.destroy', $item->id_diskon) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body">Apakah Anda Yakin Menghapus Data Master Diskon {{ $item->nama_diskon }} ?</div>
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



@endsection