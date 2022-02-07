@extends('layouts.Admin.adminlayout')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon" style="color: white"><i class="fas fa-list"></i>
                            </div>
                            <div class="page-header-subtitle" style="color: white">Keypoint Kelas</div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Keypoint</span>
                            · Tambah · Data
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('mentor-kelas.index') }}"
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

    <div class="container mt-n10">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card card-header-actions">
                        <div class="card-header ">Detail Kelas
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('mentor-kelas.store') }}" id="form1" method="POST"
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
                                    placeholder="Input Kode Receiving" value="{{ $kelas->nama_kelas }}" readonly >{{ $kelas->nama_kelas }}</textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="kode_kelas">Status Approval Video</label>
                                    <input class="form-control" id="kode_kelas" type="text" name="kode_kelas"
                                        value="{{ $kelas->status_approval_video }}" readonly />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="kode_kelas">Status Video</label>
                                    <input class="form-control" id="kode_kelas" type="text" name="kode_kelas"
                                        value="{{ $kelas->status_video }}" readonly />
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <hr>
                                <a href="{{ route('mentor-kelas.index') }}" class="btn btn-sm btn-light">Kembali</a>
                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                                    data-target="#Modalsumbit">Simpan</button>
                            </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card card-header-actions">
                        <div class="card-header">
                            Keypoint
                            <a href="" class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                                data-target="#Modalkeypoint">
                                <i class="fas fa-list mr-2"></i></i> Tambah Keypoint
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="datatable">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered table-hover dataTable"
                                                id="dataTablekonfirmasi" width="100%" cellspacing="0" role="grid"
                                                aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1" aria-sort="ascending"
                                                            aria-label="Name: activate to sort column descending"
                                                            style="width: 20px;">
                                                            No</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 80px;">
                                                            Urutan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Start date: activate to sort column ascending"
                                                            style="width: 150px;">
                                                            Keypoint</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Start date: activate to sort column ascending"
                                                            style="width: 30px;">
                                                            Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id='konfirmasi'>
                                                    @forelse ($kelas->Detailkeypoint as $item)
                                                    <tr id="item-{{ $item->id_keypoint }}" role="row" class="odd">
                                                        {{-- <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th> --}}
                                                        <td></td>
                                                        <td class="number">{{ $item->number }}</td>
                                                        <td class="nama_keypoint">{{ $item->nama_keypoint }}</td>
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
        </div>

</main>

<div class="modal fade" id="Modalkeypoint" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Keypoint</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="closetambahpajak"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="" method="POST" id="form2" class="d-inline">
                <div class="modal-body">
                    <div class="alert alert-info small" role="alert">
                        Keypoint Merupakan Modul Pembelajaran Suatu Kelas
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="number">Nomor Keypoint</label>
                        <div class="input-group input-group-joined">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-list"></i>
                                </span>
                            </div>
                            <input class="form-control" id="number" type="number" min="1" max="99" name="number"
                                placeholder="Input Nomor Keypoint">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="nama_keypoint">Nomor Keypoint</label>
                        <div class="input-group input-group-joined">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-list"></i>
                                </span>
                            </div>
                            <input class="form-control" id="nama_keypoint" type="text" name="nama_keypoint"
                                placeholder="Input Nama Keypoint/Modul">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success btn-sm" onclick="tambahkeypoint(event)" type="button">Tambah Keypoint</button>
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
                <button class="btn btn-primary" onclick="submit(event,{{ $kelas }}, {{ $kelas->id_kelas }})" type="button">Ya Sudah!</button>
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

        var key = $('#konfirmasi').children()
        for (let index = 0; index < key.length; index++) {
            var children = $(key[index]).children()
            var td_key = children[2]
            var nama_keypoint = $(td_key).html()

           

            if (nama_keypoint == '' | nama_keypoint == undefined) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Anda Belum Memasukan Data Keypoint',
                    timer: 2000,
                    timerProgressBar: true,
                })
            } else {
                var td_number = children[1]
                var number = $(td_number).html()

                console.log(number)


                dataform2.push({
                    id_kelas: id_kelas,
                    number: number,
                    nama_keypoint: nama_keypoint,
                })

                console.log(dataform2)
            }
        }

        if (dataform2.length == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Anda Belum Memasukan Data Keypoint',
                timer: 2000,
                timerProgressBar: true,
            })
        } else {
            var sweet_loader =
                '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';
            var data = {
                _token: _token,
                keypoint: dataform2
            }

            $.ajax({
                method: 'put',
                url: '/mentor/kelas/mentor-kelas/' + id_kelas,
                data: data,
                beforeSend: function () {
                    swal.fire({
                        title: 'Mohon Tunggu!',
                        html: 'Data Keypoint Sedang Diproses...',
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
                    window.location.href = '/mentor/kelas/mentor-kelas/'
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




    function tambahkeypoint(event) {
        var form = $('#form2')
        var _token = form.find('input[name="_token"]').val()
        var number = form.find('input[name="number"]').val()
        var nama_keypoint = form.find('input[name="nama_keypoint"]').val()
       
        if (number == 0 | number == '' | nama_keypoint == '') {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Terdapat Field Kosong!',
                timer: 2000,
                timerProgressBar: true,
            })
        } else {

            $('#dataTablekonfirmasi').DataTable().row.add([
                number, number, nama_keypoint, nama_keypoint
            ]).draw();

            $('#closetambahpajak').click()

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
                title: 'Berhasil Menambah Data Keypoint'
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
