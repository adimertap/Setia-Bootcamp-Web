@extends('layouts.UserDashboard.userdashlayout')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-light bg-light mb-0">
        <div class="container-fluid">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fa fa-newspaper"></i></div>
                            Edit Karya {{ $porto->nama_project }}
                        </h1>
                        <div class="page-header-subtitle">Langkah awal untuk mendapatkan pekerjaan</div>
                       
                    </div>
                   
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        @if(session('validation'))
        <div class="alert alert-danger" role="alert"> <i class="fas fa-times"></i>
            {{ session('validation') }}
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif
        <div class="row">
            <div class="col-6">
                <div class="card" style="border-radius: 20px">
                    <section>
                        <form action="{{ route('portofolio-saya.update', $porto->id_portofolio) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label">Upload Gambar Project</label>
                                            <div class="preview-zone hidden">
                                                <div class="box box-solid">
                                                    <div class="box-header with-border">
                                                        <div><b>Preview</b></div>
                                                        <div class="box-tools pull-right">
                                                            <button type="button"
                                                                class="btn btn-danger btn-xs remove-preview">
                                                                <i class="fa fa-times mr-2"></i> Reset
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="box-body"></div>
                                                </div>
                                            </div>
                                            <div class="dropzone-wrapper">
                                                <div class="dropzone-desc">
                                                    <i class="glyphicon glyphicon-download-alt"></i>
                                                    <p>Choose an image file or drag it here.</p>
                                                </div>
                                                <input type="file" name="url_gambar" class="dropzone">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </div>

            </div>
            <div class="col-6">
                <div class="card" style="border-radius: 30px">
                    <div class="card-body">
                        <div class="tab-content" id="cardTabContent">
                            <!-- Wizard tab pane item 1-->
                            <div class="tab-pane py-2 py-xl-2 fade show active" id="wizard1" role="tabpanel"
                                aria-labelledby="wizard1-tab">
                                <div class="row justify-content-center">
                                    <div class="col-xxl-10 col-xl-10">
                                        <div class="form-group">
                                            <label class="small mb-1 mr-1" for="nama_project">Nama
                                                Project</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="nama_project" type="text"
                                                name="nama_project" placeholder="Input Nama Project"
                                                value="{{ $porto->nama_project }}"
                                                class="form-control @error('nama_project') is-invalid @enderror"
                                                required />
                                            @error('nama_project')<div class="text-danger small mb-1">
                                                {{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1 mr-1" for="deskripsi_project">Deskripsi
                                                Project</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <textarea class="form-control" id="deskripsi_project" type="text"
                                                name="deskripsi_project" placeholder="Input Deskripsi Project"
                                                value="{{ $porto->deskripsi_project }}"
                                                class="form-control @error('deskripsi_project') is-invalid @enderror"
                                                required>{{ $porto->deskripsi_project }}</textarea>
                                            @error('deskripsi_project')<div class="text-danger small mb-1">
                                                {{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1 mr-1" for="url_project">URL
                                                Project</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="url_project" type="text" name="url_project"
                                                placeholder="Input URL Project" value="{{ $porto->url_project }}"
                                                class="form-control @error('url_project') is-invalid @enderror"
                                                required />
                                            @error('url_project')<div class="text-danger small mb-1">
                                                {{ $message }}
                                            </div> @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="small mb-1 mr-1" for="id_kelas">Pilih Project Kelas</label>
                                            <span class="mr-4 mb-3" style="color: red">*</span>
                                            <select class="form-control" name="id_kelas" id="id_kelas"
                                                class="form-control @error('id_kelas') is-invalid @enderror" required>
                                                <option value="{{ $porto->Kelas->id_kelas }}" holder>{{ $porto->Kelas->nama_kelas }}</option>
                                                @foreach ($kelas as $item)
                                                <option value="{{ $item->Kelas->id_kelas }}">
                                                    {{ $item->Kelas->nama_kelas }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('id_kelas')<div class="text-danger small mb-1">
                                                {{ $message }}
                                            </div> @enderror
                                        </div>
                                        <p class="small">
                                            Selesaikan kelas premium terlebih dahulu agar kamu dapat melakukan upload
                                            karya
                                            terbaikmu.
                                        </p>
                                        <hr class="my-4" />
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('portofolio-saya.index') }}" class="btn btn-light">Kembali</a>
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

            {{-- CARD 1 --}}

        </div>

</main>



<script>
    function readFile(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var htmlPreview =
                    '<img width="200" src="' + e.target.result + '" />' +
                    '<p>' + input.files[0].name + '</p>';
                var wrapperZone = $(input).parent();
                var previewZone = $(input).parent().parent().find('.preview-zone');
                var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');

                wrapperZone.removeClass('dragover');
                previewZone.removeClass('hidden');
                boxZone.empty();
                boxZone.append(htmlPreview);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function reset(e) {
        e.wrap('<form>').closest('form').get(0).reset();
        e.unwrap();
    }

    $(".dropzone").change(function () {
        readFile(this);
    });

    $('.dropzone-wrapper').on('dragover', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).addClass('dragover');
    });

    $('.dropzone-wrapper').on('dragleave', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass('dragover');
    });

    $('.remove-preview').on('click', function () {
        var boxZone = $(this).parents('.preview-zone').find('.box-body');
        var previewZone = $(this).parents('.preview-zone');
        var dropzone = $(this).parents('.form-group').find('.dropzone');
        boxZone.empty();
        previewZone.addClass('hidden');
        reset(dropzone);
    });

</script>


@endsection
