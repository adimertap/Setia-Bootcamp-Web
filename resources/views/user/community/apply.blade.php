@extends('layouts.app')

@section('name')
Apply {{ $item->nama_pengumuman }}
@endsection

@section('content')
<main>


    <section class="testimonials" style="margin-top: 0px" id="carilowongan">
        <div class="container">
            <div class="row text-center pb-70">
                <div class="col-lg-12 col-12 header-wrap">
                    <p class="story">
                        Apply Lowongan
                    </p>
                    <h2 class="primary-header">
                        {{ $item->nama_pengumuman }}
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-12">
                            <div class="item-review ">
                                <div class="user text-center">
                                    <img src="{{ url('perusahaan/logo/'. $item->User->avatar) }}" height="300"
                                        width="300" alt="">
                                    <div class="info">
                                        <h4 class="name">
                                            {{ $item->User->Perusahaan->nama_legal }}
                                        </h4>
                                        <p class="role">
                                            Jenis Perusahaan {{ $item->User->Perusahaan->jenis_perusahaan }}
                                        </p>
                                    </div>
                                </div>
                                <p class="message">
                                    Kami mencari pegawai {{ $item->job_type }}, pengalaman
                                    {{ $item->job_years_experience }} Tahun, qualification {{ $item->qualification }}
                                    dengan kisaran gaji Rp. {{ number_format($item->job_salary) }}.
                                </p>

                            </div>
                        </div>
                        <div class="col-lg-8 col-12">
                            <div class="item-review">
                                <div class="user">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="info">
                                                <h4 class="name">
                                                    {{ $item->nama_pengumuman }}
                                                </h4>
                                                <p class="role">
                                                    {{ $item->User->Perusahaan->nama_legal }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <p class="role">
                                                End in {{ $item->end_date }}
                                            </p>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-12 col-12" style="margin-top: 20px">
                                    <form action="{{ route('community.update', $item->id_pengumuman) }}" class="basic-form" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="name" class="form-label">Full Name</label>
                                                    <input name="name" type="text"
                                                        class="form-control {{ $errors->has('name') ? 'is-invalid': '' }}"
                                                        value="{{ Auth::user()->name }}" required>
                                                    @if ($errors->has('name'))
                                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-6">
                                                    <label for="email" class="form-label">Email Address</label>
                                                    <input name="email" type="email"
                                                        class="form-control {{ $errors->has('email') ? 'is-invalid': '' }}"
                                                        value="{{ Auth::user()->email }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="occupation" class="form-label">Occupation</label>
                                                    <input name="occupation" type="text"
                                                        class="form-control {{ $errors->has('occupation') ? 'is-invalid': '' }}"
                                                        placeholder="Input Occupation Anda"
                                                        value="{{ old('occupation') ?: Auth::user()->occupation }}"
                                                        required>
                                                    @if ($errors->has('occupation'))
                                                    <p class="text-danger">{{ $errors->first('occupation') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-6">
                                                    <label for="no_telp" class="form-label">Nomor Telephone</label>
                                                    <input name="no_telp" type="number"
                                                        class="form-control {{ $errors->has('no_telp') ? 'is-invalid': '' }}"
                                                        placeholder="Input Nomor Telephone Anda"
                                                        value="{{ old('no_telp') }}"
                                                        required>
                                                    @if ($errors->has('no_telp'))
                                                    <p class="text-danger">{{ $errors->first('no_telp') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                    <select name="jenis_kelamin" id="jenis_kelamin" style="border-radius: 50px; padding:12px"
                                                        class="form-control form-select {{ $errors->has('jenis_kelamin') ? 'is-invalid': '' }}"
                                                        required>
                                                        <option
                                                            value="{{ old('jenis_kelamin') }}">
                                                            Pilih Jenis Kelamin</option>
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                        @if ($errors->has('jenis_kelamin'))
                                                        <p class="text-danger">{{ $errors->first('jenis_kelamin') }}</p>
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                                    <input name="tanggal_lahir" type="date"
                                                        class="form-control {{ $errors->has('tanggal_lahir') ? 'is-invalid': '' }}"
                                                        placeholder="Input Tanggal Lahir Anda"
                                                        value="{{ old('tanggal_lahir')}}"
                                                        required>
                                                    @if ($errors->has('tanggal_lahir'))
                                                    <p class="text-danger">{{ $errors->first('tanggal_lahir') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                                            <textarea name="alamat_lengkap" type="text" style="border-radius: 50px; padding:12px"
                                                class="form-control {{ $errors->has('alamat_lengkap') ? 'is-invalid': '' }}"
                                                placeholder="Input Tanggal Lahir Anda"
                                                value="{{ old('alamat_lengkap') }}"
                                                required> </textarea>
                                            @if ($errors->has('alamat_lengkap'))
                                            <p class="text-danger">{{ $errors->first('alamat_lengkap') }}</p>
                                            @endif
                                        </div>
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="file_cv" class="form-label">File CV</label>
                                                    <input name="file_cv" type="file" accept="application/pdf"
                                                        multiple="multiple"
                                                        class="form-control {{ $errors->has('file_cv') ? 'is-invalid': '' }}"
                                                        placeholder="Input File CV Anda"
                                                        value="{{ old('file_cv') }}"
                                                        required>
                                                    <div class="small">
                                                        <span class="text-muted">Accept File in PDF Format </span>
                                                    </div>
                                                    @if ($errors->has('file_cv'))
                                                    <p class="text-danger">{{ $errors->first('file_cv') }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-6">
                                                    <label for="file_dukungan" class="form-label">File Pendukung</label>
                                                    <input name="file_dukungan" type="file" accept="application/pdf"
                                                        multiple="multiple"
                                                        class="form-control {{ $errors->has('file_dukungan') ? 'is-invalid': '' }}"
                                                        placeholder="Input File Pendukung Anda"
                                                        value="{{ old('file_dukungan') }}"
                                                        required>
                                                    <div class="small">
                                                        <span class="text-muted">Accept File in PDF Format, Anda bisa menambahkan portofolio atau sertifikat</span>
                                                    </div>
                                                    @if ($errors->has('file_dukungan'))
                                                    <p class="text-danger">{{ $errors->first('file_dukungan') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="w-100 btn btn-primary">Simpan dan
                                            Kirim</button>
                                        <p class="text-center subheader mt-4">
                                            <img src="{{ asset('images/ic_secure.svg') }}" alt=""> Your Data is secure
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>





</main>





@endsection
