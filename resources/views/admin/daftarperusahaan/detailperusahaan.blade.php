@extends('layouts.Admin.adminlayout')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container-fluid mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Perusahaan Kerjsama {{ $perusahaan->nama_legal }}</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">Detail</span>
                    · Perusahaan
                </div>
            </div>
            <div>
                <div class="col-12 col-xl-auto mb-3">
                    <a href="{{ route('daftar-perusahaan') }}"
                        class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header ">Detail Perusahaan </div>
                    <div class="card-body">
                        <div class="form-group text-center">
                            <img class="img-account-profile rounded-circle mb-2"
                                src="{{ asset('/perusahaan/logo/'.$perusahaan->User['avatar']) }}" alt="">
                            <div class="small font-italic text-muted mb-4">Logo Perusahaan</div>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="name">Nama Perusahaan</label>
                            <input class="form-control form-control-sm" id="name" type="text" name="name"
                                value="{{ $perusahaan->nama_legal }}" readonly />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="email">Jenis Perusahaan</label>
                            <input class="form-control form-control-sm" id="email" type="text" name="email"
                                value="{{ $perusahaan->jenis_perusahaan }}" readonly />
                        </div>
                        <hr class="my-4" />
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card card-header-actions">
                        <div class="card-header">Detail
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="name">Email</label>
                                        <input class="form-control form-control-sm" id="name" type="text" name="name"
                                            value="{{ $perusahaan->User->email }}" readonly />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="email">Nomor Telephone</label>
                                        <input class="form-control form-control-sm" id="email" type="text" name="email"
                                            value="{{ $perusahaan->no_telp }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="email">Tanggal Berdirinya</label>
                                        <input class="form-control form-control-sm" id="email" type="text" name="email"
                                            value="{{ $perusahaan->tanggal_berdirinya }}" readonly />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="email">Alamat Website</label>
                                        <input class="form-control form-control-sm" id="email" type="text" name="email"
                                            value="{{ $perusahaan->alamat_website }}" readonly />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="small mb-1" for="email">Alamat Kantor</label>
                                <textarea class="form-control form-control-sm" id="email" type="text" name="email"
                                    value="{{ $perusahaan->alamat_kantor }}"
                                    readonly>{{ $perusahaan->alamat_kantor }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="email">Description</label>
                                <textarea class="form-control form-control-sm" id="email" type="text" name="email"
                                    value="{{ $perusahaan->description }}"
                                    readonly>{{ $perusahaan->description }}</textarea>
                            </div>
                            <div class="text-center">
                                <div class="small font-italic text-muted mb-4">Foto Perusahaan</div>
                                <img class="img-fluid"
                                src="{{ asset('/perusahaan/profile/'.$perusahaan['foto_perusahaan']) }}" width="300" height="300" alt="">
                         
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>




@endsection
