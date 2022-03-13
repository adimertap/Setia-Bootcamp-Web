@extends('layouts.app')

@section('content')

<section class="checkout">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12 col-12">
                <img src="{{ asset('images/success_payment.png') }}" height="400" class="mb-5" alt=" ">
            </div>
            <div class=" col-lg-12 col-12 header-wrap mt-4">
                <p class="story">
                    Payment Status!
                </p>
                <h2 class="primary-header ">
                    Pembayaran Telah Berhasil
                </h2>
                <a href="#" class="btn btn-primary mt-3">
                    My Dashboard
                </a>
            </div>
        </div>
    </div>
</section>

@endsection