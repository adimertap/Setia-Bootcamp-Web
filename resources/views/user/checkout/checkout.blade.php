@extends('layouts.app')

@section('content')

<section class="checkout">
    <div class="container">
        <div class="row text-center pb-70">
            <div class="col-lg-12 col-12 header-wrap">
                <p class="story">
                   CHECKOUT KELAS
                </p>
                <h2 class="primary-header">
                    {{ $kelas->nama_kelas }}
                </h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9 col-12">
                <div class="row">
                    <div class="col-lg-5 col-12">
                        <div class="item-bootcamp">
                            <img src="{{ asset('/image/'.$kelas['cover_kelas']) }}" class="cover" alt="" style="border-radius: 20px"/>
                            <p>
                                Harga Kelas
                            </p>
                            <p class="mt-2">
                                <h5 style="color: black">
                                    Rp. {{ number_format($kelas->harga_kelas) }}
                                </h5>
                                <p style="color: grey;line-height:28px">Akses Selamanya</p> 
                            </p>
                         
                            <p class="description">
                                Bootcamp ini akan mengajak Anda untuk belajar penuh mulai dari pengenalan dasar sampai membangun sebuah projek asli
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-1 col-12"></div>
                    <div class="col-lg-6 col-12">
                        <form action="{{ route('checkout.update', $kelas->id_kelas) }}" class="basic-form" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="name" class="form-label">Full Name</label>
                                <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid': '' }}"  value="{{ Auth::user()->name }}" required>
                                <p class="small justify-items-end" style="color: grey">
                                    Note: Pastikan Nama Anda Lengkap dan Benar
                                </p>
                                @if ($errors->has('name'))
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                @endif

                            </div>
                            <div class="mb-4">
                                <label for="email" class="form-label">Email Address</label>
                                <input name="email" type="email" class="form-control {{ $errors->has('email') ? 'is-invalid': '' }}"  value="{{ Auth::user()->email }}" required>
                                @if ($errors->has('email'))
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                            
                            <div class="mb-4">
                                <label for="occupation" class="form-label">Occupation</label>
                                <input name="occupation" type="text" class="form-control {{ $errors->has('occupation') ? 'is-invalid': '' }}" placeholder="Input Pekerjaan Anda"  value="{{ old('occupation') ?: Auth::user()->occupation }}" required>
                                @if ($errors->has('occupation'))
                                    <p class="text-danger">{{ $errors->first('occupation') }}</p>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label for="card_number" class="form-label">Card Number</label>
                                <input name="card_number" type="number" class="form-control {{ $errors->has('card_number') ? 'is-invalid': '' }}" placeholder="Input Card Number" value="{{ old('card_number') ?: ''}}" required>
                                @if ($errors->has('card_number'))
                                    <p class="text-danger">{{ $errors->first('card_number') }}</p>
                                @endif
                            </div>
                            <div class="mb-5">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <label for="expired" class="form-label">Expired</label>
                                        <input name="expired" type="month" class="form-control {{ $errors->has('expired') ? 'is-invalid': '' }}" placeholder="Input Expired Card" value="{{ old('expired') ?: ''}}" required>
                                        @if ($errors->has('expired'))
                                            <p class="text-danger">{{ $errors->first('expired') }}</p>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <label for="cvc" class="form-label">CVC</label>
                                        <input name="cvc" type="number" class="form-control {{ $errors->has('cvc') ? 'is-invalid': '' }}"" placeholder="Input CVC Card" maxlength="3" value="{{ old('cvc') ?: ''}}" required>
                                        @if ($errors->has('cvc'))
                                            <p class="text-danger">{{ $errors->first('cvc') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="w-100 btn btn-primary">Pay Now</button>
                            <p class="text-center subheader mt-4">
                                <img src="{{ asset('images/ic_secure.svg') }}" alt=""> Your payment is secure and encrypted.
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection