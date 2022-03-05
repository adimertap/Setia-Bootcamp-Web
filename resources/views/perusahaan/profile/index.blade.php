@extends('layouts.Admin.adminlayout')

@section('content')

<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            Selamat Datang! {{ Auth::user()->name }}
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">{{ $today }}</span>
                            · Tanggal {{ $tanggal_tahun }} · <span id="clock">12:16 PM</span>
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <div class="small">
                            Hi! {{ Auth::user()->name }}
                        </div>
                    </div>
                </div>
            </div>
            @if(session('messageberhasil'))
                <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                    {{ session('messageberhasil') }}
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
        </div>
    </header>

    <div class="container-fluid mt-n10">
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <img class="img-account-profile rounded-circle mb-2" src="https://source.unsplash.com/QAB-WJcbgJk/300x300" alt="">
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div> 
                            <button class="btn btn-primary" type="button">Upload new image</button>
                            <a class="btn btn-primary" href="{{ route('profile-perusahaan.edit', $profile->id_perusahaan)  }}" >Edit Profile</a>  
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header">
                        Account Details
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="small mb-1">Nama Legal Perusahaan</label>
                            <input class="form-control" type="text" value="{{ $profile->nama_legal }}" readonly>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <label class="small mb-1">Jenis Perusahaan</label>
                                <input class="form-control" type="text" value="{{ $profile->jenis_perusahaan }}" readonly>
                            </div>
                            <div class="col-6 form-group">
                                <label class="small mb-1">Tanggal berdirinya</label>
                                <input class="form-control" type="text" value="{{ $profile->tanggal_berdirinya }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <label class="small mb-1">Email Perusahaan</label>
                                <input class="form-control" type="text" value="{{ $profile->User->email }}" readonly>
                            </div>
                            <div class="col-6 form-group">
                                <label class="small mb-1">Alamat Website</label>
                                <input class="form-control" type="text" value="{{ $profile->alamat_website }}" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <label class="small mb-1">Nomor Telephone</label>
                                <input class="form-control" type="text" value="{{ $profile->no_telp }}" readonly>
                            </div>
                            <div class="col-6 form-group">
                                <label class="small mb-1">Occupation</label>
                                <input class="form-control" type="text" value="{{ $profile->User->occupation }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1">Alamat Perusahaan</label>
                            <textarea class="form-control" type="text" value="{{ $profile->alamat_kantor }}" readonly>{{ $profile->alamat_kantor }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1">Description</label>
                            <textarea class="form-control" type="text" value="{{ $profile->description }}" rows="5" readonly>{{ $profile->description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection