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
                            Edit Data Kelas {{ $kelas->nama_kelas }}
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('kelas.index') }}" class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
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
                            <div class="wizard-step-text-name">Form Edit Kelas</div>
                            <div class="wizard-step-text-details">Lengkapi formulir edit kelas</div>
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
                                <h3 class="text-primary">Kelas Bootcamp</h3>
                                <h5 class="card-title">Input Formulir Kelas</h5>
                                <form action="{{ route('kelas.update', $kelas->id_kelas) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="kode_kelas">Kode Kelas</label>
                                            <input class="form-control" id="kode_kelas" type="text" name="kode_kelas"
                                                placeholder="Input Kode Kelas" value="{{ $kelas->kode_kelas }}" readonly />
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label class="small mb-1 mr-1" for="nama_kelas">Nama Kelas</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="nama_kelas" type="text" name="nama_kelas"
                                                placeholder="Input Nama Kelas" value="{{ $kelas->nama_kelas }}"
                                                class="form-control @error('nama_kelas') is-invalid @enderror" />
                                            @error('nama_kelas')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="id_jenis_kelas">Pilih Jenis
                                                Kelas</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <select class="form-control" name="id_jenis_kelas" id="id_jenis_kelas"
                                                class="form-control @error('id_jenis_kelas') is-invalid @enderror">
                                                <option value="{{ $kelas->Jeniskelas->id_jenis_kelas }}" holder>{{ $kelas->Jeniskelas->jenis_kelas }}</option>
                                                @foreach ($jenis_kelas as $jenis)
                                                <option value="{{ $jenis->id_jenis_kelas }}">
                                                    {{ $jenis->jenis_kelas }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('id_jenis_kelas')<div class="text-danger small mb-1">
                                                {{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="id_level">Pilih Level</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <select class="form-control" name="id_level" id="id_level"
                                                class="form-control @error('id_level') is-invalid @enderror">
                                                <option value="{{ $kelas->level->id_level }}" holder>{{ $kelas->level->nama_level }}</option>
                                                @foreach ($level as $levels)
                                                <option value="{{ $levels->id_level }}">
                                                    {{ $levels->nama_level }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('id_level')<div class="text-danger small mb-1">
                                                {{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="url_telegram">URL Group Telegram</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="url_telegram" type="text" name="url_telegram"
                                                placeholder="Input Url Grup Telegram" value="{{ $kelas->url_telegram }}"
                                                class="form-control @error('url_telegram') is-invalid @enderror" required/>
                                            @error('url_telegram')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                            <div class="small">
                                                <span class="text-muted">Pastikan Anda telah Membuat Grup Telegram </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <div class="row justify-content-between align-items-center">
                                                <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                                                    <label class="small mb-1 mr-1" for="harga_kelas">Harga
                                                        Kelas</label><span class="mr-4 mb-3" style="color: red">*</span>
                                                </div>
                                            </div>
                                            <input class="form-control" name="harga_kelas" type="number"
                                                id="harga_kelas" placeholder="Input Harga Kelas"
                                                value="{{ $kelas->harga_kelas }}"
                                                class="form-control @error('harga_kelas') is-invalid @enderror" />
                                            @error('harga_kelas')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                            <div class="small">
                                                <span class="font-weight-500 text-primary">Nominal (IDR) : </span>
                                                <span id="detailharga"></span>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="status">Status</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <select name="status" id="status" class="form-control"
                                                class="form-control @error('status') is-invalid @enderror">
                                                <option value="{{ $kelas->status }}">{{ $kelas->status }}</option>
                                                <option value="Aktif">Aktif</option>
                                                <option value="Tidak Aktif">Tidak Aktif</option>
                                            </select>
                                            @error('status')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="cover_kelas">Gambar Cover Kelas</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="cover_kelas" type="file" name="cover_kelas"
                                                value="{{ $kelas->cover_kelas }}" accept="image/*" multiple="multiple"
                                                class="form-control @error('cover_kelas') is-invalid @enderror">
                                            {{-- <img class="mt-2" src="/image/{{ $kelas->cover_kelas }}" width="300px"> --}}
                                            @error('cover_kelas')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                            <div class="small">
                                                <span class="text-muted">Accept Picture in PNG, JPG, JPEG Format </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="tentang_kelas">Tentang Kelas</label>
                                        <textarea class="form-control" name="tentang_kelas" id="tentang_kelas" cols="10"
                                            rows="5" placeholder="Input Deskripsi Mengenai Kelas"
                                            value="{{ $kelas->tentang_kelas }}"
                                            class="form-control @error('tentang_kelas') is-invalid @enderror">{{ $kelas->tentang_kelas }}</textarea>
                                        @error('tentang_kelas')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('kelas.index') }}" class="btn btn-light">Kembali</a>
                                        <button class="btn btn-primary" type="Submit">Edit!</button>
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
