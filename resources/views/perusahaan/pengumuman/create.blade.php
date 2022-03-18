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
                            Tambah Data Pengumuman
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
                            <div class="wizard-step-text-name">Form Tambah Pengumuman</div>
                            <div class="wizard-step-text-details">Lengkapi formulir penambahan pengumuman</div>
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
                                <h5 class="card-title">Input Formulir Pengumuman</h5>
                                <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    
                                    <div class="form-group">
                                        <label class="small mb-1 mr-1" for="nama_pengumuman">Nama Pengumuman</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input class="form-control" id="nama_pengumuman" type="text" name="nama_pengumuman"
                                            placeholder="Input Nama Pengumuman" value="{{ old('nama_pengumuman') }}"
                                            class="form-control @error('nama_pengumuman') is-invalid @enderror" required/>
                                        @error('nama_pengumuman')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="small mb-1 mr-1" for="job_type">Job Type</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <select name="job_type" id="job_type" class="form-control"
                                                value="{{ old('job_type') }}"
                                                class="form-control @error('job_type') is-invalid @enderror" required>
                                                <option value="{{ old('job_type')}}">Pilih Tipe Job</option>
                                                <option value="Full Time">Full Time</option>
                                                <option value="Part Time">Part Time</option>
                                                <option value="Seasonal">Seasonal</option>
                                                <option value="Contract">Contract</option>
                                            </select>
                                            @error('job_type')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="small mb-1 mr-1" for="qualification">Qualification</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <select name="qualification" id="qualification" class="form-control"
                                                value="{{ old('qualification') }}"
                                                class="form-control @error('qualification') is-invalid @enderror" required>
                                                <option value="{{ old('qualification')}}">Pilih Kualifikasi</option>
                                                <option value="Bachelor's degree">Bachelor's degree</option>
                                                <option value="Diploma">Diploma</option>
                                                <option value="Advanced Diplomas">Advanced Diplomas</option>
                                                <option value="Higher Certificates">Higher Certificates</option>
                                            </select>
                                            @error('qualification')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="form-label mr-1" for="start_date">Tanggal Mulai</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input type="date" class="form-control" placeholder="Input Tanggal Mulai Pengumuman"
                                                name="start_date" value="{{ old('start_date') }}"
                                                class="form-control @error('start_date') is-invalid @enderror" required>
                                            @error('start_date')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="form-label mr-1" for="end_date">Tanggal Selesai</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input type="date" class="form-control" placeholder="Input Tanggal Selesai Pengumuman"
                                                name="end_date" value="{{ old('end_date') }}"
                                                class="form-control @error('end_date') is-invalid @enderror" required>
                                            @error('end_date')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="form-label mr-1" for="job_years_experience">Years of Experience</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input type="text" class="form-control" placeholder="Input Years of Experience"
                                                name="job_years_experience" value="{{ old('job_years_experience') }}"
                                                class="form-control @error('job_years_experience') is-invalid @enderror" required>
                                            @error('job_years_experience')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="form-label mr-1" for="job_salary">Kisaran Gaji</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input type="number" class="form-control" placeholder="Input Kisaran Gaji" id="harga_kelas"
                                                name="job_salary" value="{{ old('job_salary') }}"
                                                class="form-control @error('job_salary') is-invalid @enderror" required>
                                            @error('job_salary')<div class="text-danger small mb-1"> Nominal Between Rp. 1.000.000 - Rp. 100.000.000
                                            </div> @enderror
                                            <div class="small">
                                                <span class="font-weight-500 text-primary">Nominal (IDR) : </span>
                                                <span id="detailharga"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1 mr-1" for="job_description">Job Description</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <textarea class="form-control" id="job_description" type="text" rows="5" cols="5"
                                            name="job_description" placeholder="Input Job Description" value="{{ old('job_description') }}"
                                            class="form-control @error('job_description') is-invalid @enderror" required></textarea>
                                        @error('job_description')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1 mr-1" for="job_requirement">Job Requirement</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <textarea class="form-control" id="job_requirement" type="text" rows="5" cols="5"
                                            name="job_requirement" placeholder="Input Job Requirement" value="{{ old('job_requirement') }}"
                                            class="form-control @error('job_requirement') is-invalid @enderror" required></textarea>
                                        @error('job_requirement')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Data yang Anda inputkan sudah sesuai
                                            </label>
                                        </div>
                                    </div>

                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('pengumuman.index') }}" class="btn btn-light">Kembali</a>
                                        <button class="btn btn-primary" type="Submit">Tambah!</button>
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



<script>
    $(document).ready(function () {
        $('#validasierror').click();

        $('#harga_kelas').on('input', function () {
            var nominal = $(this).val()
            var nominal_fix = new Intl.NumberFormat('id', {
                style: 'currency',
                currency: 'IDR'
            }).format(nominal)

            $('#detailharga').html(nominal_fix);
        })

    });

</script>


@endsection
