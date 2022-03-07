@extends('layouts.Admin.adminlayout')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container-fluid mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Detail Lowongan {{ $pengumuman->User->Perusahaan->nama_legal }}</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">Detail</span>
                    · Lowongan
                </div>
            </div>
            <div>
                <div class="col-12 col-xl-auto mb-3">
                    <a href="{{ route('daftar-lowongan') }}"
                        class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header ">Detail Lowongan </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="small mb-1" for="name">Nama Lowongan</label>
                            <input class="form-control form-control-sm" id="name" type="text" name="name"
                                value="{{ $pengumuman->nama_pengumuman }}" readonly />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="email">Dari Perusahaan</label>
                            <input class="form-control form-control-sm" id="email" type="text" name="email"
                                value="{{ $pengumuman->User->Perusahaan->nama_legal }}" readonly />
                        </div>
                   
                        <hr class="my-4" />
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card card-header-actions">
                        <div class="card-header">Detail Lowongan
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="name">Job Type</label>
                                        <input class="form-control form-control-sm" id="name" type="text" name="name"
                                            value="{{ $pengumuman->job_type }}" readonly />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="email">Job Years Experience</label>
                                        <input class="form-control form-control-sm" id="email" type="text" name="email"
                                            value="{{ $pengumuman->job_years_experience }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="email">Job Salary (Kira-Kira)</label>
                                        <input class="form-control form-control-sm" id="email" type="text" name="email"
                                            value="{{ $pengumuman->job_salary }}" readonly />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="email">Qualification</label>
                                        <input class="form-control form-control-sm" id="email" type="text" name="email"
                                            value="{{ $pengumuman->qualification }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="email">Post Date</label>
                                        <input class="form-control form-control-sm" id="email" type="text" name="email"
                                            value="{{ $pengumuman->start_date }}" readonly />
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="email">End Date</label>
                                        <input class="form-control form-control-sm" id="email" type="text" name="email"
                                            value="{{ $pengumuman->end_date }}" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="email">Job Description</label>
                                <textarea class="form-control form-control-sm" rows="5" id="email" type="text" name="email"
                                    value="{{ $pengumuman->job_description }}"
                                    readonly>{{ $pengumuman->job_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="email">Job Requirement</label>
                                <textarea class="form-control form-control-sm" rows="5" id="email" type="text" name="email"
                                    value="{{ $pengumuman->job_requirement }}"
                                    readonly>{{ $pengumuman->job_requirement }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>




@endsection
