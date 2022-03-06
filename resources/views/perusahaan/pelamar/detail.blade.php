@extends('layouts.Admin.adminlayout')

@section('name')
Detail Pelamar {{ $item->nama_lengkap }}
@endsection

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="far fa-clipboard"></i></div>
                            Detail Data Pelamar {{ $item->nama_lengkap }}
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('pelamar-perusahaan.index') }}"
                            class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-xxl-8 col-xl-12">
                        <h6>Pengumuman Lowongan yang dituju</h6>
                        <div class="form-group">
                            <label class="small mb-1 mr-1" for="nama_pengumuman">Lamaran yang dituju</label>
                            <input class="form-control" id="nama_pengumuman" type="text" name="nama_pengumuman"
                                placeholder="Input Nama Pengumuman" value="{{ $item->Pengumuman->nama_pengumuman }}"
                                readonly>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="small mb-1 mr-1" for="nama_pengumuman">Job Type</label>
                                    <input class="form-control" id="nama_pengumuman" type="text" name="nama_pengumuman"
                                        placeholder="Input Nama Pengumuman" value="{{ $item->Pengumuman->job_type }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="small mb-1 mr-1" for="nama_pengumuman">Job Years Experience</label>
                                    <input class="form-control" id="nama_pengumuman" type="text" name="nama_pengumuman"
                                        placeholder="Input Nama Pengumuman"
                                        value="{{ $item->Pengumuman->job_years_experience }} Tahun" readonly>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="small mb-1 mr-1" for="nama_pengumuman">Qualification</label>
                                    <input class="form-control" id="nama_pengumuman" type="text" name="nama_pengumuman"
                                        placeholder="Input Nama Pengumuman"
                                        value="{{ $item->Pengumuman->qualification }}" readonly>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h6>Identitas</h6>
                        <div class="form-group">
                            <label class="small mb-1 mr-1" for="nama_pengumuman">Nama lengkap</label>
                            <input class="form-control" id="nama_pengumuman" type="text" name="nama_pengumuman"
                                placeholder="Input Nama Pengumuman" value="{{ $item->nama_lengkap }}" readonly>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="small mb-1 mr-1" for="nama_pengumuman">Email</label>
                                    <input class="form-control" id="nama_pengumuman" type="text" name="nama_pengumuman"
                                        placeholder="Input Nama Pengumuman" value="{{ $item->User->email }}" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="small mb-1 mr-1" for="nama_pengumuman">Nomor Telephone</label>
                                    <input class="form-control" id="nama_pengumuman" type="text" name="nama_pengumuman"
                                        placeholder="Input Nama Pengumuman" value="{{ $item->no_telp }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="small mb-1 mr-1" for="nama_pengumuman">Jenis Kelamin</label>
                                    <input class="form-control" id="nama_pengumuman" type="text" name="nama_pengumuman"
                                        placeholder="Input Nama Pengumuman" value="{{ $item->jenis_kelamin }}" readonly>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="small mb-1 mr-1" for="nama_pengumuman">Tanggal Lahir</label>
                                    <input class="form-control" id="nama_pengumuman" type="text" name="nama_pengumuman"
                                        placeholder="Input Nama Pengumuman" value="{{ $item->tanggal_lahir }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1 mr-1" for="nama_pengumuman">Alamat lengkap</label>
                            <textarea class="form-control" id="nama_pengumuman" type="text" name="nama_pengumuman"
                                placeholder="Input Nama Pengumuman" value="{{ $item->alamat_lengkap }}"
                                readonly>{{ $item->alamat_lengkap }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="small mb-1 mr-1" for="nama_pengumuman">File CV: </label>
                                @if ($item->file_cv != null)
                                <a href="{{ route('pelamar-perusahaan-cv',$item->file_cv) }}" class="btn btn-sm mr-2"><i
                                        class="fas fa-download"></i></a>
                                @else
                                <i class="fas fa-times"></i>
                                @endif
                            </div>
                            <div class="col-6">
                                <label class="small mb-1 mr-1" for="nama_pengumuman">File Pendukung: </label>
                                @if ($item->file_dukungan != null)
                                <a href="{{ route('pelamar-perusahaan-cv',$item->file_dukungan) }}"
                                    class="btn btn-sm mr-2"><i class="fas fa-download"></i></a>
                                @else
                                <i class="fas fa-times"></i>
                                @endif
                            </div>
                        </div>



                        <hr class="my-4" />
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('pelamar-perusahaan.index') }}" class="btn btn-light">Kembali</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</main>



@endsection
