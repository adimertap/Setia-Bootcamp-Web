@extends('layouts.Admin.adminlayout')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container-fluid mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Mentor {{ $mentor->name }}</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">Detail</span>
                    · Mentor
                </div>
            </div>
            <div>
                <div class="col-12 col-xl-auto mb-3">
                    <a href="{{ route('list-mentor.index') }}"
                        class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header ">Detail Mentor </div>
                    <div class="card-body">
                        <div class="form-group text-center">
                            <img class="img-account-profile rounded-circle mb-2"
                                src="{{ asset('/image/'.$mentor['avatar']) }}" alt="">
                            <img src="{{ url($mentor->avatar) }}" alt="">
                            <div class="small font-italic text-muted mb-4">Profile Picture Mentor</div>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="name">Nama Mentor</label>
                            <input class="form-control form-control-sm" id="name" type="text" name="name"
                                value="{{ $mentor->name }}" readonly />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="email">Email Mentor</label>
                            <input class="form-control form-control-sm" id="email" type="text" name="email"
                                value="{{ $mentor->email }}" readonly />
                        </div>
                        <hr class="my-4" />
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card card-header-actions">
                        <div class="card-header">Kelas yang diajarkan
                            <a href="" class="btn-xs btn-primary" type="button" data-toggle="modal"
                                data-target="#Modalkelasmentor">
                                <i class="fas fa-address-card mr-1"></i>Atur Kelas Mentor
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="datatable">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-hover dataTable" id="dataTable"
                                            width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                            style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 20px;">No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 150px;">Nama Kelas</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 50px;">Jenis Kelas</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 50px;">Level</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 80px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($mentor->detailkelas as $items)
                                                <tr role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                                    <td>{{ $items->nama_kelas }}</td>
                                                    <td>{{ $items->Jeniskelas->jenis_kelas }}</td>
                                                    <td>{{ $items->level->nama_level }}</td>
                                                    <td class="text-center">
                                                        <a href="" class="btn btn-danger btn-datatable" type="button"
                                                            data-toggle="modal"
                                                            data-target="#Modalhapus-{{ $items->id_kelas }}">
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

@forelse ($mentor->detailkelas as $tes)
<div class="modal fade" id="Modalhapus-{{ $tes->id_kelas }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('list-mentor-destroy-kelas',  $tes->id_kelas) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body">Apakah Anda Yakin Menghapus Kelas Mentor?</div>
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


<div class="modal fade" id="Modalkelasmentor" tabindex="-1" role="dialog" data-backdrop="static"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Atur Kelas Mentor</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('list-mentor.update', $mentor->id) }}" method="POST" id="form1" class="d-inline">
                @method('PUT')
                @csrf
                <div class="modal-body">

                    <label class="small mb-1">Tentukan Kelas yang akan diajarkan oleh Mentor</label>
                    <div class="alert alert-danger" id="alertdatakosong" role="alert" style="display:none"><i
                            class="far fa-times-circle"></i>
                        <span class="small">Error! Terdapat Data yang Masih Kosong!</span>
                        <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1" for="id_kelas">Pilih Kelas</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <div class="input-group input-group-joined">
                            <input class="form-control" type="text" placeholder="Pilih Kelas yang diajarkan"
                                aria-label="Search" id="detailkelas" name="detailkelas">
                            <div class="input-group-append">
                                <a href="" class="input-group-text" type="button" data-toggle="modal"
                                    data-target="#Modalkelas">
                                    <i class="fas fa-folder-open"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" onclick="submit1(event, {{ $mentor->id }})"
                        type="button">Atur!</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="Modalkelas" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content ">
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
                                                style="width: 20px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 150px;">Nama Kelas</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 50px;">Jenis Kelas</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 40px;">Level</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 40px;">Mentor</th>
                                            <th class="sorting mr-2" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 50px;"> <input onClick="toggle(this)" name="chk[]"
                                                    type="checkbox" />Pilih Semua</th>
                                        </tr>
                                    </thead>
                                    <tbody id="kelas">
                                        @forelse ($kelas as $item)
                                        <tr id="item-{{ $item->id_kelas }}" role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td class="nama_kelas"><span id="{{ $item->id_kelas }}">{{ $item->nama_kelas }}</span></td>
                                            <td class="jenis_kelas">{{ $item->Jeniskelas->jenis_kelas }}</td>
                                            <td class="level_kelas">{{ $item->level->nama_level }}</td>
                                            <td>
                                                @if (is_null($item->name))
                                                    <span class="badge badge-danger ">Belum Terdapat Mentor</span>
                                                @else
                                                    <span>{{ $item->name }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if (is_null($item->name))
                                                    <div class="">
                                                        <input class="checkpegawai" id="customCheck1-{{ $item->id_kelas }}"
                                                            type="checkbox" name="cek" />
                                                        <label class="" for="customCheck1">Pilih</label>
                                                    </div>
                                                @else
                                                    <i class="fa fa-check-circle"></i>
                                                @endif

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
            title: 'Berhasil Menambahkan Data Kelas'
        })
    }

    function submit1(event, id) {
        var tbody = $(`#kelas`)
        var detailkelas = []
        for (let index = 0; index < tbody.length; index++) {
            var tes = $(tbody[index]).children()
            var check = tes.find('.checkpegawai').each(function (index, element) {
                var value = $(element).is(':checked')
                if (value == true) {
                    var tr = $(element).parent().parent().parent()
                    var td = $(tr).find('.nama_kelas')[0]
                    var nama = $(td).html()

                    var span = $(td).children()[0]
                    var id_kelas = $(span).attr('id')

                    detailkelas.push({
                        id_kelas: id_kelas,
                        id: id
                    })
                }
            })
        }

        var _token = $('#form1').find('input[name="_token"]').val()
        var data = {
            _token: _token,
            detailkelas: detailkelas
        }

        if (detailkelas == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Anda Belum Memilih Kelas',
            })
        } else {
            var sweet_loader =
                '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

            $.ajax({
                method: 'put',
                url: '/admin/list-mentor/' + id,
                data: data,
                beforeSend: function () {
                    swal.fire({
                        title: 'Mohon Tunggu!',
                        html: 'Data Pengaturan Kelas Sedang Diproses...',
                        showConfirmButton: false,
                        onRender: function () {
                            // there will only ever be one sweet alert open.
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
                    window.location.href = '/admin/list-mentor/' +id
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

    function toggle(source) {
        checkboxes = document.getElementsByName('cek');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
    }
    

    $(document).ready(function () {
        $('#dataTableKelas').DataTable()
    });

</script>

@endsection
