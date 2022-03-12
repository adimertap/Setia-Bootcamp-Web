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
                                            <td>
                                                @if ($item->jenis_diskon == 'Voucher')
                                                {{ $item->kode_diskon }}
                                                @else
                                                Diskon Flash Sale

                                                @endif
                                            </td>

                                            <td>{{ $item->nama_diskon }}</td>
                                            <td class="text-center">{{ $item->jumlah_diskon }}%</td>
                                            <td class="text-center">
                                                @if ($item->jenis_diskon == 'Voucher')
                                                <span class="badge badge-success">{{ $item->jenis_diskon }}</span>
                                                @else
                                                <span class="badge badge-warning">{{ $item->jenis_diskon }}</span>
                                                @endif

                                            </td>
                                            <td class="text-center">
                                                @if ($item->jenis_diskon == 'FlashSale')
                                                <a href="" class="btn btn-secondary btn-datatable" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modaldetail-{{ $item->id_diskon }}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                @else

                                                @endif
                                                <a href="" class="btn btn-primary btn-datatable" type="button"
                                                    data-toggle="modal" data-target="#Modaledit-{{ $item->id_diskon }}">
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
            <form action="{{ route('diskon.store') }}" method="POST" id="form1">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-danger" id="alertdatakosong" role="alert" style="display:none"><i
                            class="far fa-times-circle"></i>
                        <span class="small">Error! Terdapat Data yang Masih Kosong!</span>
                        <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="row mb-1" id="radio1">
                        <div class="col-md-6">
                            <input class="mr-1" value="Voucher" type="radio" name="radio2" checked>Diskon Voucher
                        </div>
                        <div class="col-md-6">
                            <input class="mr-1" value="FlashSale" type="radio" name="radio2">Flash Sale
                        </div>
                    </div>
                    <p></p>
                    <div id="FlashSale" style="display:none">
                        <div class="form-group">
                            <label class="small mb-1 mr-1" for="kode_po">Pilih Kelas</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <div class="input-group input-group-joined">
                                <input class="form-control" type="text" placeholder="Pilih Kelas" aria-label="Search"
                                    id="detailkelas">
                                <div class="input-group-append">
                                    <a href="" class="input-group-text" type="button" data-toggle="modal"
                                        data-target="#Modalkelas">
                                        <i class="fas fa-folder-open"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="small" id="alertgaji" style="display:none">
                                <span class="font-weight-500 text-danger">Error! Anda Belum Memilih Kelas!</span>
                                <button class="close" type="button" onclick="$(this).parent().hide()"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="Voucher">
                        <div class="form-group">
                            <label class="small mb-1 mr-1" for="kode_diskon">Kode Voucher</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <input class="form-control {{ $errors->has('kode_diskon') ? 'Is_invalid' : '' }}"
                                name="kode_diskon" type="text" id="kode_diskon" value="{{ old('kode_diskon') }}"
                                placeholder="Input Kode Voucher" required />
                            @if ($errors->has('kode_diskon'))
                            <p class="text-danger">{{ $errors->first('kode_diskon') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="nama_diskon">Nama Diskon</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control {{ $errors->has('nama_diskon') ? 'Is_invalid' : '' }}"
                            name="nama_diskon" type="text" id="nama_diskon" placeholder="Input Nama Diskon"
                            value="{{ old('nama_diskon') }}" required />
                        @if ($errors->has('nama_diskon'))
                        <p class="text-danger">{{ $errors->first('nama_diskon') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="jumlah_diskon">Jumlah Diskon (%)</label><span
                            class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control {{ $errors->has('jumlah_diskon') ? 'Is_invalid' : '' }}"
                            name="jumlah_diskon" type="number" min="1" max="100" id="jumlah_diskon"
                            placeholder="Input Jumlah Persen Diskon" value="{{ old('jumlah_diskon') }}" required />
                        @if ($errors->has('jumlah_diskon'))
                        <p class="text-danger">{{ $errors->first('jumlah_diskon') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="description">Description</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <textarea class="form-control {{ $errors->has('description') ? 'Is_invalid' : '' }}"
                            name="description" type="text" id="description" placeholder="Input Description"
                            value="{{ old('description') }}"></textarea>
                        @if ($errors->has('description'))
                        <p class="text-danger">{{ $errors->first('description') }}</p>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" onclick="simpandata()" type="button">Tambah!</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="Modalkelas" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light ">
                <h5 class="modal-title">Pilih Kelas</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="datatable">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="dataTableKelas"
                                    width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                    style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 30px;">No.</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 70px;">Nama Kelas</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 70px;">Jenis Kelas</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 70px;">Harga Kelas</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 50px;"> <input onClick="toggle(this)" name="chk[]"
                                                    type="checkbox" />
                                                Pilih Semua</th>
                                        </tr>
                                    </thead>
                                    <tbody id="kelas">
                                        @forelse ($kelas as $item)
                                        <tr id="item-{{ $item->id_kelas }}">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td class="nama_kelas"><span
                                                    id="{{ $item->id_kelas }}">{{ $item->nama_kelas }}</span></td>
                                            <td>
                                                <div class="jenis_kelas">{{ $item->Jeniskelas->jenis_kelas }}</div>
                                            </td>
                                            <td>
                                                <div class="harga_kelas">Rp
                                                    {{ number_format($item->harga_kelas,2,',','.') }}</div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <input class="checkkelas" id="customCheck1-{{ $item->id_kelas }}"
                                                        type="checkbox" name="cek" />
                                                    <label class="" for="customCheck1">Pilih</label>
                                                </div>

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
            <div class="modal-footer">
                <button class="btn btn-success" onclick="tambahkelas(event)" type="button" data-dismiss="modal">Tambah
                </button>
            </div>

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
                    @if ($item->jenis_diskon == 'Voucher')
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="kode_diskon">Kode Diskon</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="kode_diskon" type="text" id="kode_diskon"
                            value="{{ $item->kode_diskon }}"/>
                    </div>
                    @else
                    <h5>Flash Sale</h5>
                    @endif
                  
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="nama_diskon">Nama Diskon</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="nama_diskon" type="text" id="nama_diskon"
                            placeholder="Input Nama Diskon" value="{{ $item->nama_diskon }}"/>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="jumlah_diskon">Jumlah Diskon (%)</label><span
                            class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control" name="jumlah_diskon" type="number" min="1" max="100"
                            id="jumlah_diskon" placeholder="Input Jumlah Persen Diskon"
                            value="{{ $item->jumlah_diskon  }}"/>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="description">Description</label><span
                            class="mr-4 mb-3" style="color: red">*</span>
                        <textarea class="form-control" name="description" type="text"
                            id="description" placeholder="Input Description"
                            value="{{ $item->description  }}">{{ $item->description }}</textarea>
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

@forelse ($diskon as $detail)
<div class="modal fade" id="Modaldetail-{{ $detail->id_diskon }}" tabindex="-1" role="dialog"
    aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light ">
                <h5 class="modal-title">Detail Kelas</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="datatable">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="dataTableDetail"
                                    width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                    style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 30px;">No.</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 70px;">Nama Kelas</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 70px;">Jenis Kelas</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 70px;">Harga Kelas Setelah Diskon</th>
                                        </tr>
                                    </thead>
                                    @php
                                    $diskon = $detail->jumlah_diskon
                                    @endphp
                                    <tbody>
                                        @forelse ($detail->detailkelas as $item)
                                        <tr>
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td>{{ $item->nama_kelas }}</td>
                                            <td>{{ $item->Jeniskelas->jenis_kelas }}</td>
                                            <td class="text-center">Rp. {{ number_format($item->harga_kelas-$item->harga_kelas*$diskon/100) }}</td>
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
@empty

@endforelse

<script>
    function tambahkelas(event) {
        var Terpilih = 'Kelas Telah Dipilih'
        var detailkelas = $('#detailkelas').val(Terpilih)

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        Toast.fire({
            icon: 'success',
            title: 'Berhasil Menambahkan Data Pegawai'
        })
    }

    function simpandata() {
        var _token = $('#form1').find('input[name="_token"]').val()
        var kode_diskon = $('#kode_diskon').val()
        var nama_diskon = $('#nama_diskon').val()
        var jumlah_diskon = $('#jumlah_diskon').val()
        var description = $('#description').val()
        // Radio
        var radio = $('#radio1').find("input[name='radio2']:checked").val()


        if (radio == 'FlashSale') {
            var tbody = $(`#kelas`)
            var detailkelas = []
            for (let index = 0; index < tbody.length; index++) {
                var tes = $(tbody[index]).children()
                var check = tes.find('.checkkelas').each(function (index, element) {
                    var value = $(element).is(':checked')
                    if (value == true) {
                        var tr = $(element).parent().parent().parent()
                        var td = $(tr).find('.nama_kelas')[0]
                        var nama = $(td).html()

                        var span = $(td).children()[0]
                        var id_kelas = $(span).attr('id')

                        detailkelas.push({
                            id_kelas: id_kelas,
                        })
                    }
                })
            }

            var sweet_loader =
                '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

            if (jumlah_diskon == '' || nama_diskon == '' || detailkelas == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terdapat Field yang masih kosong',
                    timer: 2000,
                    timerProgressBar: true,
                })
            } else if (jumlah_diskon > 100) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Diskon tidak boleh melebihi angka 100',
                    timer: 2000,
                    timerProgressBar: true,
                })
            } else {
                var data = {
                    _token: _token,
                    nama_diskon: nama_diskon,
                    jumlah_diskon: jumlah_diskon,
                    description: description,
                    jenis_diskon: radio,
                    detailkelas: detailkelas
                }

                $.ajax({
                    method: 'post',
                    url: "/admin/masterdata/diskon",
                    data: data,
                    beforeSend: function () {
                        swal.fire({
                            title: 'Mohon Tunggu!',
                            html: 'Data Diskon Sedang Diproses...',
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
                        window.location.href = '/admin/masterdata/diskon'
                    },
                    error: function (error) {
                        console.log(error)
                        swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            html: error.responseJSON.message
                        });
                    }
                });

            }



        } else if (radio == 'Voucher') {

            var sweet_loader =
                '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

            if (kode_diskon == '' || nama_diskon == '' || jumlah_diskon == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terdapat Field yang masih kosong',
                    timer: 2000,
                    timerProgressBar: true,
                })
            } else if (jumlah_diskon > 100) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Diskon tidak boleh melebihi angka 100',
                    timer: 2000,
                    timerProgressBar: true,
                })
            } else {
                var data2 = {
                    _token: _token,
                    kode_diskon: kode_diskon,
                    nama_diskon: nama_diskon,
                    jumlah_diskon: jumlah_diskon,
                    jenis_diskon: radio,
                    description: description,
                }

                $.ajax({
                    method: 'post',
                    url: "/admin/masterdata/diskon",
                    data: data2,
                    beforeSend: function () {
                        swal.fire({
                            title: 'Mohon Tunggu!',
                            html: 'Data Diskon Sedang Diproses...',
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
                        window.location.href = '/admin/masterdata/diskon'
                    },
                    error: function (error) {
                        console.log(error)
                        swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            html: error.responseJSON.message
                        });
                    }
                });



            }



        }


    }

    $(document).ready(function () {
        $('#validasierror').click();

        $('#dataTableKelas').DataTable()
        $('#dataTableDetail').DataTable()

        $("#radio1").change(function () {
            var value = $("input[name='radio2']:checked").val();

            if (value == 'Voucher') {
                $('#FlashSale').hide()
                $('#Voucher').show()
            } else {
                $('#FlashSale').show()
                $('#Voucher').hide()

            }


        });

    });

    function toggle(source) {
        checkboxes = document.getElementsByName('cek');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }

</script>


@endsection
