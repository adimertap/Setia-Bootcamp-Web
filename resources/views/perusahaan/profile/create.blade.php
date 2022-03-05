<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Lengkapi Profile Perusahaan</title>
    <link href="{{ url('admin_template/dist/css/styles.css')}}" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
    <script data-search-pseudo-elements defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <!-- Create Organization-->
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-11">
                            <div class="card mt-5">
                                <div class="card-body p-5 text-center">
                                    <div class="icons-org-create align-items-center mx-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-users icon-users">
                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="9" cy="7" r="4"></circle>
                                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        </svg>
                                        <svg class="svg-inline--fa fa-plus fa-w-14 icon-plus" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="plus" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z">
                                            </path>
                                        </svg><!-- <i class="icon-plus fas fa-plus"></i> -->
                                    </div>
                                    <div class="h3 text-primary font-weight-300 mb-0">Lengkapi Profile Perusahaan</div>
                                </div>
                                <hr class="m-0">
                                <div class="card-body p-5">
                                    <form action="{{ route('profile-perusahaan.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-6 form-group">
                                                <label class="small mb-1 mr-1" for="nama_legal">Nama Legal
                                                    Perusahaan</label><span class="mr-4 mb-3"
                                                    style="color: red">*</span>
                                                <input class="form-control form-control-solid" id="nama_legal"
                                                    type="text" name="nama_legal"
                                                    placeholder="Input Nama Legal Perusahaan"
                                                    value="{{ old('nama_legal') }}"
                                                    class="form-control @error('nama_legal') is-invalid @enderror"
                                                    required />
                                                @error('nama_legal')<div class="text-danger small mb-1">{{ $message }}
                                                </div> @enderror
                                            </div>
                                            <div class="col-6 form-group">
                                                <label class="small mb-1 mr-1" for="jenis_perusahaan">Jenis Perusahaan</label><span class="mr-4 mb-3" style="color: red">*</span>
                                                <select name="jenis_perusahaan" id="jenis_perusahaan" class="form-control form-control-solid"
                                                    value="{{ old('jenis_perusahaan') }}"
                                                    class="form-control @error('jenis_perusahaan') is-invalid @enderror" required>
                                                    <option value="{{ old('jenis_perusahaan')}}">Pilih Jenis Perusahaan</option>
                                                    <option value="Perseorangan">Perseorangan</option>
                                                    <option value="CV">CV</option>
                                                    <option value="PT">PT</option>
                                                    <option value="Koperasi">Koperasi</option>
                                                    <option value="Firma">Firma</option>
                                                    <option value="Persero">Persero</option>
                                                </select>
                                                @error('jenis_perusahaan')<div class="text-danger small mb-1">{{ $message }}
                                                </div> @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 form-group">
                                                <label class="small mb-1 mr-1" for="tanggal_berdirinya">Tanggal Berdirinya</label><span class="mr-4 mb-3"
                                                    style="color: red">*</span>
                                                <input class="form-control form-control-solid" id="tanggal_berdirinya"
                                                    type="date" name="tanggal_berdirinya"
                                                    placeholder="Input Tanggal Berdirinya"
                                                    value="{{ old('tanggal_berdirinya') }}"
                                                    class="form-control @error('tanggal_berdirinya') is-invalid @enderror"
                                                    required />
                                                @error('tanggal_berdirinya')<div class="text-danger small mb-1">{{ $message }}
                                                </div> @enderror
                                            </div>
                                            <div class="col-6 form-group">
                                                <label class="small mb-1 mr-1" for="alamat_website">Alamat Website</label><span class="mr-4 mb-3"
                                                    style="color: red">*</span>
                                                <input class="form-control form-control-solid" id="alamat_website"
                                                    type="text" name="alamat_website"
                                                    placeholder="Input Tanggal Berdirinya"
                                                    value="{{ old('alamat_website') }}"
                                                    class="form-control @error('alamat_website') is-invalid @enderror"
                                                    required />
                                                @error('alamat_website')<div class="text-danger small mb-1">{{ $message }}
                                                </div> @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6 form-group">
                                                <label class="small mb-1 mr-1" for="no_telp">Nomor Telephone</label><span class="mr-4 mb-3"
                                                    style="color: red">*</span>
                                                <input class="form-control form-control-solid" id="no_telp"
                                                    type="number" name="no_telp"
                                                    placeholder="Input Nomor Telephone"
                                                    value="{{ old('no_telp') }}"
                                                    class="form-control @error('no_telp') is-invalid @enderror"
                                                    required />
                                                @error('no_telp')<div class="text-danger small mb-1">{{ $message }}
                                                </div> @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="small mb-1" for="foto_perusahaan">Foto Perusahaan</label><span
                                                    class="mr-4 mb-3" style="color: red">*</span>
                                                <input class="form-control form-control-solid" id="foto_perusahaan" type="file" name="foto_perusahaan"
                                                    value="{{ old('foto_perusahaan') }}" accept="image/*" multiple="multiple"
                                                    class="form-control @error('foto_perusahaan') is-invalid @enderror">
                                                @error('foto_perusahaan')<div class="text-danger small mb-1">{{ $message }}
                                                </div> @enderror
                                                <div class="small">
                                                    <span class="text-muted">Accept Picture in PNG, JPG, JPEG Format </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1 mr-1" for="alamat_kantor">Alamat Lengkap</label><span class="mr-4 mb-3"
                                                style="color: red">*</span>
                                            <textarea class="form-control form-control-solid" id="alamat_kantor"
                                                type="text" name="alamat_kantor"
                                                placeholder="Input Alamat lengkap Perusahaan"
                                                value="{{ old('alamat_kantor') }}"
                                                class="form-control @error('alamat_kantor') is-invalid @enderror"
                                                required ></textarea>
                                            @error('alamat_kantor')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1 mr-1" for="description">Deskripsi</label>
                                            <textarea class="form-control form-control-solid" id="description"
                                                type="text" name="description"
                                                placeholder="Input Deskripsi Perusahaan"
                                                value="{{ old('description') }}"
                                                class="form-control @error('description') is-invalid @enderror"></textarea>
                                            @error('description')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-block btn-primary" type="submit">Simpan Profile</button></div>
                                       
                                        <div class="form-group mb-0 text-center">
                                            Or,
                                            <a href="{{ route('profile-perusahaan.index') }}">skip for now</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer mt-auto footer-dark">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 small">Copyright © Satria Bootcamp 2022</div>
                        <div class="col-md-6 text-md-right small">
                            <a href="#!">Privacy Policy</a>
                            ·
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js">
    </script>
</body>

</html>
