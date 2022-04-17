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
                            <div class="page-header-subtitle" style="color: white">Kuis Kelas</div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Kuis</span>
                            · Tambah · Data
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('mentor-kuis.index') }}" class="btn btn-sm btn-light text-primary">Kembali</a>
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
                        <div class="card-header ">Detail Kuis
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('mentor-kuis.store') }}" id="form1" method="POST"
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
                            {{-- <div class="form-group">
                                <label class="small mb-1" for="poin_kelas">Poin Kelas</label>
                                <input class="form-control" id="poin_kelas" type="text" name="poin_kelas"
                                    placeholder="Input Poin Kelas" value="{{ $kelas->poin_kelas ?? '' }}"></input>
                            </div> --}}
                            <div class="form-group text-right">
                                <hr>
                                <a href="{{ route('mentor-kuis.index') }}" class="btn btn-sm btn-light">Kembali</a>
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
                                <h2 class="text-primary">Susun Kuis Kelas</h2>
                                <p class="text-gray-700">Kuis kelas ditujukan untuk <b>mengukur hasil belajar</b>
                                    dari user yang telah membeli kelas. Pertanyaan kuis kelas <b>minimal 3 </b>
                                    pertanyaan.
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
                                    style="width: 23rem;" src="/images/quiz.png"></div>
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
                    Pertanyaan Kuis Kelas
                    <a href="" class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                        data-target="#Modalkuis">
                        <i class="fas fa-plus"></i> Tambah Pertanyaan
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
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 200px;">
                                                    Pertanyaan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 40px;">
                                                    A</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 40px;">
                                                    B</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 40px;">
                                                    C</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 40px;">
                                                    D</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 70px;">
                                                    Answer</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 30px;">
                                                    Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id='konfirmasi'>
                                            @forelse ($kelas->Detailkuis as $item)
                                            <tr id="item-{{ $item->id_kuis }}" role="row" class="odd">
                                                <td></td>
                                                <td class="soal_kuis">{{ $item->soal_kuis }}</td>
                                                <td class="option_a">{{ $item->option_a }}</td>
                                                <td class="option_b">{{ $item->option_b }}</td>
                                                <td class="option_c">{{ $item->option_c }}</td>
                                                <td class="option_d">{{ $item->option_d }}</td>
                                                <td class="jawaban">{{ $item->jawaban }}</td>
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


<div class="modal fade" id="Modalkuis" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Pertanyaan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="closetambahpajak"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="" method="POST" id="form2" class="d-inline">
                <div class="modal-body">
                    <div class="alert alert-info small" role="alert">
                        Isikan form pertanyaan dengan lengkap!
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="soal_kuis">Soal Kuis</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <div class="input-group input-group-joined">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-list"></i>
                                </span>
                            </div>
                            <textarea class="form-control" id="soal_kuis" type="text" name="soal_kuis"
                                placeholder="Input Soal Kuis" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-3">
                            <label class="small mb-1 mr-1" for="option_a">Option A</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <div class="input-group input-group-joined">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        A
                                    </span>
                                </div>
                                <input class="form-control" id="option_a" type="text" name="option_a"
                                    placeholder="Input Option A" required>
                            </div>
                        </div>
                        <div class="form-group col-3">
                            <label class="small mb-1 mr-1" for="option_b">Option B</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <div class="input-group input-group-joined">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        B
                                    </span>
                                </div>
                                <input class="form-control" id="option_b" type="text" name="option_b"
                                    placeholder="Input Option B" required>
                            </div>
                        </div>
                        <div class="form-group col-3">
                            <label class="small mb-1 mr-1" for="option_c">Option C</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <div class="input-group input-group-joined">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        C
                                    </span>
                                </div>
                                <input class="form-control" id="option_c" type="text" name="option_c"
                                    placeholder="Input Option C" required>
                            </div>
                        </div>
                        <div class="form-group col-3">
                            <label class="small mb-1 mr-1" for="option_d">Option D</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <div class="input-group input-group-joined">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        D
                                    </span>
                                </div>
                                <input class="form-control" id="option_d" type="text" name="option_d"
                                    placeholder="Input Option D" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group">
                            <label class="small mb-1 mr-1" for="jawaban">Pilih Jawaban</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <select name="jawaban" id="jawaban" class="form-control" value="{{ old('jawaban') }}"
                                required>
                                <option>Pilih Jawaban yang Benar</option>
                                <option value="option_a">Option A</option>
                                <option value="option_b">Option B</option>
                                <option value="option_c">Option C</option>
                                <option value="option_d">Option D</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success btn-sm" onclick="tambahkuis(event)" type="button">Tambah
                        Pertanyaan</button>
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
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Kuis Kelas</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">Apakah Kuis Anda inputkan sudah lengkap?</div>
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

        var kuis = $('#konfirmasi').children()
        for (let index = 0; index < kuis.length; index++) {
            var children = $(kuis[index]).children()
            var td_soal = children[1]
            var soal_kuis = $(td_soal).html()

            var td_a = children[2]
            var option_a = $(td_a).html()

            var td_b = children[3]
            var option_b = $(td_b).html()

            var td_c = children[4]
            var option_c = $(td_c).html()

            var td_d = children[5]
            var option_d = $(td_d).html()

            var td_jawaban = children[6]
            var jawaban = $(td_jawaban).html()


            if (soal_kuis == '' | option_a == '' | option_a == '' | option_b == '' | option_c == '' | option_d == '' | jawaban == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Anda Belum Memasukan Data Kuis',
                    timer: 2000,
                    timerProgressBar: true,
                })
            } else {
                dataform2.push({
                    id_kelas: id_kelas,
                    soal_kuis: soal_kuis,
                    option_a: option_a,
                    option_b: option_b,
                    option_c: option_c,
                    option_d: option_d,
                    jawaban: jawaban
                })
            }
        }

        if (dataform2.length == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Anda Belum Memasukan Data Kuis',
                timer: 2000,
                timerProgressBar: true,
            })
        } else {
            var sweet_loader =
                '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';
            var data = {
                _token: _token,
                kuis: dataform2
            }

            $.ajax({
                method: 'put',
                url: '/mentor/video/mentor-kuis/' + id_kelas,
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
                    window.location.href = '/mentor/video/mentor-kuis/'
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

    function tambahkuis(event) {
        var form = $('#form2')
        var _token = form.find('input[name="_token"]').val()
        var soal_kuis = form.find('textarea[name="soal_kuis"]').val()
        var option_a = form.find('input[name="option_a"]').val()
        var option_b = form.find('input[name="option_b"]').val()
        var option_c = form.find('input[name="option_c"]').val()
        var option_d = form.find('input[name="option_d"]').val()
        var jawaban = $('#jawaban').val()
        console.log(jawaban)

        if (soal_kuis == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Soal Kuis Masih Kosong!',
                timer: 2000,
                timerProgressBar: true,
            })
        } else if (option_a == '' | option_b == '' | option_c == '' | option_d == ''){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Option Masih Kosong!',
                timer: 2000,
                timerProgressBar: true,
            })
        } else if (jawaban == '' | jawaban == 'Pilih Jawaban yang Benar'){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Jawaban Masih Kosong!',
                timer: 2000,
                timerProgressBar: true,
            })
        } else {

            $('#dataTablekonfirmasi').DataTable().row.add([
                soal_kuis, soal_kuis, option_a, option_b, option_c, option_d, jawaban
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
                title: 'Berhasil Menambah Data Pertanyaan Kuis'
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
