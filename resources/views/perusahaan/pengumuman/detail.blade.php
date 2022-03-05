@extends('layouts.Admin.adminlayout')

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
                            Detail Data Pengumuman
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('pengumuman.index') }}" class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="nav nav-pills nav-justified flex-column flex-xl-row nav-wizard" id="cardTab" role="tablist">
                    <!-- Wizard navigation item 1-->
                    <a class="nav-item nav-link active" id="wizard1-tab" href="#wizard1" data-toggle="tab" role="tab"
                        aria-controls="wizard1" aria-selected="true">
                        <div class="wizard-step-icon"><i class="fas fa-plus"></i></div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Form Pengumuman</div>
                        </div>
                    </a>

                </div>
            </div>

            {{-- CARD 1 --}}
            <div class="card-body">
                <div class="tab-content" id="cardTabContent">
                    <!-- Wizard tab pane item 1-->
                    <div class="tab-pane py-2 py-xl-2 fade show active" id="wizard1" role="tabpanel"
                        aria-labelledby="wizard1-tab">
                        <div class="row justify-content-center">
                            <div class="col-xxl-10 col-xl-10">
                                <h3 class="text-primary">Pengumuman Lowongan</h3>
                           
                                    <div class="form-group">
                                        <label class="small mb-1 mr-1" for="nama_pengumuman">Nama Pengumuman</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input class="form-control" id="nama_pengumuman" type="text" name="nama_pengumuman"
                                            placeholder="Input Nama Pengumuman" value="{{ $item->nama_pengumuman }}"
                                            class="form-control @error('nama_pengumuman') is-invalid @enderror" readonly/>
                                        @error('nama_pengumuman')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="small mb-1 mr-1" for="job_type">Job Type</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="nama_pengumuman" type="text" name="nama_pengumuman"
                                            placeholder="Input Nama Pengumuman" value="{{ $item->job_type }}"
                                            class="form-control @error('nama_pengumuman') is-invalid @enderror" readonly/>
                                        @error('nama_pengumuman')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="small mb-1 mr-1" for="qualification">Qualification</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="qualification" type="text" name="qualification"
                                            placeholder="Input Nama Pengumuman" value="{{ $item->qualification }}"
                                            class="form-control @error('nama_pengumuman') is-invalid @enderror" readonly/>
                                        @error('nama_pengumuman')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="form-label mr-1" for="start_date">Tanggal Mulai</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input type="text" class="form-control" placeholder="Input Tanggal Mulai Pengumuman"
                                                name="start_date" value="{{ $item->start_date }}"
                                                class="form-control @error('start_date') is-invalid @enderror" readonly>
                                            @error('start_date')<div class="invalid-feedback">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="form-label mr-1" for="end_date">Tanggal Selesai</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input type="text" class="form-control" placeholder="Input Tanggal Selesai Pengumuman"
                                                name="end_date" value="{{ $item->end_date }}"
                                                class="form-control @error('end_date') is-invalid @enderror" readonly>
                                            @error('end_date')<div class="invalid-feedback">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="form-label mr-1" for="job_years_experience">Years of Experience</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input type="text" class="form-control" placeholder="Input Years of Experience"
                                                name="job_years_experience" value="{{ $item->job_years_experience }}"
                                                class="form-control @error('job_years_experience') is-invalid @enderror" readonly>
                                            @error('job_years_experience')<div class="invalid-feedback">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="form-label mr-1" for="job_salary">Job Salary (Kisaran)</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input type="text" class="form-control" placeholder="Input Kisaran Gaji" id="harga_kelas"
                                                name="job_salary" value="Rp. {{ number_format($item->job_salary) }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1 mr-1" for="job_description">Job Description</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <textarea class="form-control" id="job_description" type="text" rows="5" cols="5"
                                            name="job_description" placeholder="Input Job Description" value="{{ $item->job_description }}"
                                            class="form-control @error('job_description') is-invalid @enderror" readonly>{{ $item->job_description }}</textarea>
                                        @error('job_description')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1 mr-1" for="job_requirement">Job Requirement</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <textarea class="form-control" id="job_requirement" type="text" rows="5" cols="5"
                                            name="job_requirement" placeholder="Input Job Requirement" value="{{ $item->job_requirement }}"
                                            class="form-control @error('job_requirement') is-invalid @enderror" readonly>{{ $item->job_requirement }}</textarea>
                                        @error('job_requirement')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('pengumuman.index') }}" class="btn btn-light">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>



@endsection
