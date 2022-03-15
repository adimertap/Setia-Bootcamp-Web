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
                            Karyamu {{ $item->nama_project }}
                        </h1>
                        <div class="page-header-subtitle">Langkah awal untuk mendapatkan pekerjaan</div>

                    </div>

                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card" style="border-radius: 20px">
                    <section>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <img src="{{ asset('/porto/'.$item['url_gambar']) }}" alt="" style="width: 600px" />
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
                                                value="{{ $item->nama_project }}" readonly />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1 mr-1" for="deskripsi_project">Deskripsi
                                                Project</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <textarea class="form-control" id="deskripsi_project" type="text"
                                                name="deskripsi_project" placeholder="Input Deskripsi Project"
                                                value="{{ $item->deskripsi_project }}"
                                                class="form-control @error('deskripsi_project') is-invalid @enderror"
                                                readonly>{{ $item->deskripsi_project }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1 mr-1" for="url_project">URL
                                                Project</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="url_project" type="text" name="url_project"
                                                placeholder="Input URL Project" value="{{ $item->url_project }}"
                                                class="form-control @error('url_project') is-invalid @enderror"
                                                readonly />
                                            <a href="{{ $item->url_project }}" class="small" type="button">
                                                Menuju URL
                                            </a>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1 mr-1" for="deskripsi_project">Kelas</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="deskripsi_project" type="text"
                                                name="deskripsi_project" placeholder="Input Deskripsi Project"
                                                value="{{ $item->Kelas->nama_kelas }}"
                                                class="form-control @error('deskripsi_project') is-invalid @enderror"
                                                readonly></input>
                                        </div>
                                        
                                        <hr class="my-4" />
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route('portofolio-saya.index') }}"
                                                class="btn btn-light">Kembali</a>
                                        </div>
                                        </form>
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
