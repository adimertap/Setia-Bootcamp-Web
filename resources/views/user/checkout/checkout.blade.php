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
                                @if (count($kelas->Detaildiskon) == '0')
                                    <h4><b>Rp. {{ number_format($kelas->harga_kelas) }}</b></h4>
                                @else
                                    <s style="color: red">Rp. {{ number_format($kelas->harga_kelas) }}</s>
                                    <h4><b>Rp. {{ number_format($kelas->harga_kelas - $kelas->harga_kelas * $kelas->Detaildiskon[0]->Diskon->jumlah_diskon / 100) }}</b></h4>
                                @endif

                                <p style="color: grey;line-height:28px">Akses Selamanya</p> 
                            </p?>
                         
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
                                <label for="phone" class="form-label">Nomor Telephone</label>
                                <input name="phone" type="number" class="form-control {{ $errors->has('phone') ? 'is-invalid': '' }}" placeholder="Input Phone Number" value="{{ old('phone') ?: Auth::user()->phone}}" required>
                                @if ($errors->has('phone'))
                                    <p class="text-danger">{{ $errors->first('phone') }}</p>
                                @endif
                            </div>
                            <div class="mb-4">
                                <label for="address" class="form-label">Alamat</label>
                                <input name="address" type="text" class="form-control {{ $errors->has('address') ? 'is-invalid': '' }}" placeholder="Input Alamat Lengkap" value="{{ old('address') ?: Auth::user()->address}}" required></input>
                                @if ($errors->has('address'))
                                    <p class="text-danger">{{ $errors->first('address') }}</p>
                                @endif
                            </div>
                            @if (count($kelas->Detaildiskon) == '0')
                            <div class="mb-4">
                                <label for="discount" class="form-label">Discount Code / Voucher</label>
                                <input name="discount" type="text" class="form-control {{ $errors->has('discount') ? 'is-invalid': '' }}" placeholder="Input Voucher Diskon" value="{{ old('discount') }}"></input>
                                @if ($errors->has('discount'))
                                    <p class="text-danger">{{ $errors->first('discount') }}</p>
                                @endif
                            </div>
                            @else
                            <div class="mb-4">
                                <label for="discount" class="form-label">Discount Code / Voucher</label>
                                <input name="discount" type="text" class="form-control {{ $errors->has('discount') ? 'is-invalid': '' }}" placeholder="Input Voucher Diskon" value="{{ $kelas->Detaildiskon[0]->Diskon->kode_diskon }}" readonly></input>
                                @if ($errors->has('discount'))
                                    <p class="text-danger">{{ $errors->first('discount') }}</p>
                                @endif
                            </div>
                            @endif
                          
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