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
                            Tambah Data Mentor
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('list-mentor.index') }}" class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
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
                            <div class="wizard-step-text-name">Form Tambah Mentor</div>
                            <div class="wizard-step-text-details">Lengkapi formulir penambahan Mentor</div>
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
                                <h3 class="text-primary">Mentor Kelas</h3>
                                <h5 class="card-title">Input Formulir Mentor</h5>
                                <form action="{{ route('list-mentor.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="small mb-1 mr-1" for="name">Nama Lengkap Mentor</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input class="form-control" id="name" type="text" name="name"
                                            placeholder="Input Nama Lengkap Mentor" value="{{ old('name') }}"
                                            class="form-control @error('name') is-invalid @enderror" required/>
                                        @error('name')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                        <span class="small text-mute">NOTE: Pastikan Nama Lengkap sesuai dengan KTP agar Sertifikat tidak terdapat kesalahan</span>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="email">Email Mentor</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="email" type="email" name="email"
                                                placeholder="Input Email Mentor" value="{{ old('email') }}"
                                                class="form-control @error('email') is-invalid @enderror" required/>
                                            @error('email')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="avatar">Profile Picture Mentor</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="avatar" type="file" name="avatar"
                                                value="{{ old('avatar') }}" accept="image/*" multiple="multiple"
                                                class="form-control @error('avatar') is-invalid @enderror">
                                            @error('avatar')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                            <div class="small">
                                                <span class="text-muted">Accept Picture in PNG, JPG, JPEG Format </span>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Input Password" name="password" required
                                                autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password-confirm" class="d-block">Password Confirmation</label>
                                            <input id="password-confirm" type="password" class="form-control"
                                                placeholder="Konfirmasi Password" name="password_confirmation" required
                                                autocomplete="new-password">
                                        </div>
                                    </div>

                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('list-mentor.index') }}" class="btn btn-light">Kembali</a>
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
    });

</script>


@endsection
