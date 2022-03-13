@extends('layouts.app')

@section('content')

<section class="checkout">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12 col-12">
                <img src="{{ asset('images/error_payment.png') }}" height="400" class="mb-5" alt=" ">
            </div>
            <div class=" col-lg-12 col-12 header-wrap mt-4">
                <p class="story">
                    Payment Status!
                </p>
                <h2 class="primary-header ">
                    Pembayaran Gagal!
                </h2>
                <a href="{{ route('program-kelas.index') }}" class="btn btn-primary mt-3">
                    Kembali ke Catalog
                </a>
            </div>
        </div>
    </div>
</section>

@endsection