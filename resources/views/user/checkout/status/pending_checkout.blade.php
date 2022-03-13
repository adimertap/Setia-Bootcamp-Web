@extends('layouts.app')

@section('content')

<section class="checkout">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12 col-12">
                <img src="{{ asset('images/wait_payment.png') }}" height="400" class="mb-5" alt=" ">
            </div>
            <div class=" col-lg-12 col-12 header-wrap mt-4">
                <p class="story">
                    Payment Status!
                </p>
                <h2 class="primary-header ">
                    Segera Selesaikan Pembayaran Anda!
                </h2>
                <p>
                    Refresh Page jika sudah melakukan pembayaran!
                </p>
                <a href="{{ route('user.dashboard') }}" class="btn btn-primary mt-3">
                    My Dashboard
                </a>
            </div>
        </div>
    </div>
</section>

@endsection