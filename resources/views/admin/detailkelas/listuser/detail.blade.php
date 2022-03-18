@extends('layouts.Admin.adminlayout')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container-fluid mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Detail User {{ $item[0]->name }}</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">Detail</span>
                    · User
                </div>
            </div>
            <div>
                <div class="col-12 col-xl-auto mb-3">
                    <a href="{{ route('list-user.index') }}"
                        class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header ">Detail User </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="name">Nama User</label>
                                    <input class="form-control form-control-sm" id="name" type="text" name="name"
                                        value="{{ $item[0]->name }}" readonly />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="email">Email User</label>
                                    <input class="form-control form-control-sm" id="email" type="text" name="email"
                                        value="{{ $item[0]->email }}" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="name">Occupation</label>
                                    <input class="form-control form-control-sm" id="name" type="text" name="name"
                                        value="{{ $item[0]->name }}" readonly />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="email">Phone</label>
                                    <input class="form-control form-control-sm" id="email" type="text" name="email"
                                        value="{{ $item[0]->phone ?? 'Belum Terisi' }}" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="name">Tanggal Terdaftar</label>
                                    <input class="form-control form-control-sm" id="name" type="text" name="name"
                                        value="{{ date('d M Y', strtotime($item[0]->created_at)) }}" readonly />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="email">Role</label>
                                    <input class="form-control form-control-sm" id="email" type="text" name="email"
                                        value="{{ $item[0]->role }}" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="email">Address</label>
                            <input class="form-control form-control-sm" id="email" type="text" name="email"
                                value="{{ $item[0]->address ?? 'Belum Terisi' }}" readonly />
                        </div>
                       
                        
                        <hr class="my-4" />
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card card-header-actions">
                        <div class="card-header">Kelas yang dibeli
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
                                                        style="width: 50px;">Status Kelas</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($item as $items)
                                                <tr role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                                    <td>{{ $items->Kelas->nama_kelas }}</td>
                                                    <td>{{ $items->Kelas->Jeniskelas->jenis_kelas }}</td>
                                                    <td>{{ $items->status_kelas }}</td>
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


@endsection
