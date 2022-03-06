@extends('layouts.app')

@section('name')
Profile {{ $item->nama_legal }}
@endsection

@section('content')
<main>

   
    <section class="testimonials" style="margin-top: 0px;" id="carilowongan">
        <div class="container">
            <div class="row text-center pb-70">
                <div class="col-lg-12 col-12 header-wrap">
                    <p class="story">
                        Profile Perusahaan
                    </p>
                    <h2 class="primary-header">
                       {{ $item->nama_legal }}
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center"">
                <div class="col-lg-12 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="item-review p-5">
                                <div class="user">
                                    <img src="{{ url('perusahaan/logo/'. $item->User->avatar) }}" class="photo" alt="">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="info">
                                                <h4 class="name">
                                                    {{ $item->nama_legal }}
                                                </h4>
                                                <p class="role">
                                                    Jenis Perusahaan {{ $item->jenis_perusahaan }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <p class="role">
                                               Foto Perusahaan
                                            </p>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <table border="0" style="margin-top: 20px">
                                            <tr><td>Nama Legal</td><td>: {{ $item->nama_legal }}</td><td><!-- input field--></td></tr>
                                            <tr><td>Jenis Perusahaan</td><td>: {{ $item->jenis_perusahaan }}</td><td><!-- input field--></td></tr>
                                            <tr><td>Tanggal Berdiri</td><td>: {{ $item->tanggal_berdirinya }}</td><td><!-- input field--></td></tr>
                                            <tr><td>Nomor Telephone</td><td>: {{ $item->no_telp }}</td><td><!-- input field--></td></tr>
                                            <tr><td>Email</td><td>: {{ $item->User->email }}</td><td><!-- input field--></td></tr>
                                            <tr><td>Website</td><td>: {{ $item->alamat_website }}</td><td><!-- input field--></td></tr>
                                            <var><tr><td>Alamat Kantor</td><td>: {{ $item->alamat_kantor }}</td><td><!-- input field--></td></tr></var>
                                          </table>
                                    </div>
                                    <div class="col-4">
                                        <img src="{{ url('perusahaan/profile/'. $item->foto_perusahaan) }}" class="img-fluid" width="300" height="300" alt="">
                                    </div>
                                </div>
                                <hr>
                                <h6 class="name">
                                    Description
                                </h6>
                                <p class="message" style="margin-top: 2px">
                                    {{ $item->description }}
                                </p>
                                <p class="cta text-right">
                                    <a href="{{ route('community.index') }}" class="btn btn-master btn-secondary">
                                        Kembali
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="row copyright">
                            <div class="col-lg-12 col-12">
                                <p>
                                    All Rights Reserved. Copyright PT Setia Mandiri Perkasa.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>





</main>





@endsection
