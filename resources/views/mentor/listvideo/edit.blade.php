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
                            <div class="page-header-subtitle" style="color: white">Video Kelas</div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Video</span>
                            · Tambah · Data
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('mentor-video.index') }}"
                            class="btn btn-sm btn-light text-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="alert alert-danger" id="alertpajakkosong" role="alert" style="display:none"> <i
                    class="fas fa-times"></i>
                Error! Terdapat Data Kosong!
                <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
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
                        <form action="{{ route('mentor-video.store') }}" id="form1" method="POST"
                            enctype="multipart/form-data">
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
                                <textarea class="form-control" id="nama_kelas" type="text" name="nama_kelas"
                                    placeholder="Input Kode Receiving" value="{{ $kelas->nama_kelas }}"
                                    readonly>{{ $kelas->nama_kelas }}</textarea>
                            </div>
                            <div class="form-group text-right">
                                <hr>
                                <a href="{{ route('mentor-video.index') }}" class="btn btn-sm btn-light">Kembali</a>
                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                                    data-target="#Modalsumbit">Simpan Data</button>
                            </div>

                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-waves mb-4">
                    <div class="card-body p-5">
                        <div class="row align-items-center justify-content-between">
                            <div class="col">
                                <h2 class="text-primary">Upload Video Kelas</h2>
                                <p class="text-gray-700">Setelah Anda melakukan upload video pada <b>Youtube Channel
                                    </b>, Anda
                                    diharuskan
                                    menginputkan URL video pada halaman ini. Upload video berdasarkan <b>keypoint atau
                                        modul</b>
                                    yang telah disusun.
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
                    Video Kelas
                    <a href="" class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                        data-target="#Modalvideo">
                        <i class="fas fa-video mr-2"></i> Tambah Video
                    </a>
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
                                                    style="width: 150px;">
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
                                                    style="width: 30px;">
                                                    Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id='konfirmasi'>
                                            @forelse ($kelas->Detailvideo as $item)
                                            <tr id="item-{{ $item->id_detail_video }}" role="row" class="odd">
                                                {{-- <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th> --}}
                                                <td></td>
                                                <td><span id="{{ $item->Keypoint->id_keypoint }}"></span>{{ $item->Keypoint->nama_keypoint }}</td>
                                                <td class="nama_video">{{ $item->nama_video }}</td>
                                                <td class="url_video">{{ $item->url_video }}</td>
                                                <td class="keterangan_video">{{ $item->keterangan_video }}</td>
                                                <td>
                                                  
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
                                        @forelse ($keypoint as $item)
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


<div class="modal fade" id="Modalvideo" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Video</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="closetambahpajak"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="" method="POST" id="form2" class="d-inline">
                <div class="modal-body">
                    <div class="alert alert-info small" role="alert">
                        Pilih Modul dan Siapkan URL Video Youtube
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="id_keypoint">Pilih Modul</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <select class="form-control" name="id_keypoint" id="id_keypoint">
                            <option>Pilih Modul</option>
                            @foreach ($keypoint as $tes)
                            <option value="{{ $tes->id_keypoint }}">{{ $tes->nama_keypoint }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="nama_video">Nama Video</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <div class="input-group input-group-joined">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-list"></i>
                                </span>
                            </div>
                            <input class="form-control" id="nama_video" type="text" name="nama_video"
                                placeholder="Input Nama Video">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="url_video">URL Video Youtube</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <div class="input-group input-group-joined">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fab fa-youtube"></i>
                                </span>
                            </div>
                            <input class="form-control" id="url_video" type="text" name="url_video"
                                placeholder="Input URL Video">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="keterangan_video">Keterangan Video</label>
                        <div class="input-group input-group-joined">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-clipboard-list"></i>
                                </span>
                            </div>
                            <textarea class="form-control" id="keterangan_video" type="text" name="keterangan_video"
                                placeholder="Input Keterangan"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success btn-sm" onclick="tambahvideo(event)" type="button">Tambah
                        Video</button>
                </div>
        </div>
        </form>
    </div>
</div>

<div class="modal fade" id="Modalsumbit" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success-soft">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Keypoint</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">Apakah Form yang Anda inputkan sudah benar?</div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" onclick="submit(event,{{ $kelas }}, {{ $kelas->id_kelas }})"
                    type="button">Ya Sudah!</button>
            </div>
        </div>
    </div>
</div>

<template id="template_delete_button">
    <button class="btn btn-danger btn-datatable" onclick="hapussparepart(this)" type="button">
        <i class="fas fa-trash"></i>
    </button>
</template>

<template id="template_add_button">
    <button class="btn btn-success btn-datatable" type="button" data-toggle="modal" data-target="#Modaltambah">
        <i class="fas fa-plus"></i>
    </button>
</template>

<script>
    function submit(event, kelas, id_kelas) {
        event.preventDefault()
        var form1 = $('#form1')
        var dataform2 = []
        var _token = form1.find('input[name="_token"]').val()

        var video = $('#konfirmasi').children()
        for (let index = 0; index < video.length; index++) {
            var children = $(video[index]).children()
            var td_video = children[1]
            var span = $(td_video).children()[0]
            var id_keypoint = $(span).attr('id')

            var td_nama_video = children[2]
            var nama_video = $(td_nama_video).html()

            var td_url_video = children[3]
            var url_video = $(td_url_video).html()

            var td_keterangan = children[4]
            var keterangan_video = $(td_keterangan).html()

            if (nama_video == '' | url_video == '' | keterangan_video == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Anda Belum Memasukan Data Video',
                    timer: 2000,
                    timerProgressBar: true,
                })
            } else {
                dataform2.push({
                    id_keypoint: id_keypoint,
                    id_kelas: id_kelas,
                    nama_video: nama_video,
                    url_video: url_video,
                    keterangan_video: keterangan_video,
                })
            }
        }

        if (dataform2.length == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Anda Belum Memasukan Data Video',
                timer: 2000,
                timerProgressBar: true,
            })
        } else {
            var sweet_loader =
                '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';
            var data = {
                _token: _token,
                video: dataform2
            }

            $.ajax({
                method: 'put',
                url: '/mentor/video/mentor-video/' + id_kelas,
                data: data,
                beforeSend: function () {
                    swal.fire({
                        title: 'Mohon Tunggu!',
                        html: 'Data Video Sedang Diproses...',
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
                    window.location.href = '/mentor/video/mentor-video/'
                    console.log(response)
                },
                error: function (response) {
                    console.log(response)
                    swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        html: '<h5>Error!</h5>'
                    });
                }
            });
        }
    }

    function tambahvideo(event) {
        var form = $('#form2')
        var _token = form.find('input[name="_token"]').val()
        var id_keypoint = form.find('select[name=id_keypoint]').val()
        var nama_keypoint = $(`#id_keypoint :selected`).text().trim();
        var nama_video = form.find('input[name="nama_video"]').val()
        var url_video = form.find('input[name="url_video"]').val()
        var keterangan_video = form.find('textarea[name="keterangan_video"]').val()

        if (nama_video == '' | url_video == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Terdapat Field Kosong!',
                timer: 2000,
                timerProgressBar: true,
            })
        } else {

            $('#dataTablekonfirmasi').DataTable().row.add([
                nama_keypoint,`<span id=${id_keypoint}>${nama_keypoint}</span>`, nama_video, url_video, keterangan_video, keterangan_video
            ]).draw();

            $('#closetambahpajak').click()
            $("#form2")[0].reset();

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
                title: 'Berhasil Menambah Data Video Pembelajaran'
            })
        }
    }

    function hapussparepart(element) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var table = $('#dataTablekonfirmasi').DataTable()
                var row = $(element).parent().parent()
                table.row(row).remove().draw();
            }
        })

    }

    $(document).ready(function () {
        $('#dataTableKeypoint').DataTable();
        var template = $('#template_delete_button').html()
        $('#dataTablekonfirmasi').DataTable({
            "columnDefs": [{
                    "targets": -1,
                    "data": null,
                    "defaultContent": template
                },
                {
                    "targets": 0,
                    "data": null,
                    'render': function (data, type, row, meta) {
                        return meta.row + 1
                    }
                }
            ]
        });
    });

</script>

@endsection
