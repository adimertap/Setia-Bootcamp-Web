@extends('layouts.UserDashboard.userdashlayout')

@section('content')
<section class="py-5">
    <main>
        <div class="container">
            <div class="row justify-content-center empty-state">
                <div class="col-lg-12 col-10 text-center">
                    <img src="{{asset('images/sorry.png')}}" width="500" height="500" alt=""
                        class="mb-2 img-fluid">
                    <h1 class="mb-3">
                        Mohon maaf!
                    </h1>
                    <p class="subtitle-primary mb-5"
                        style="width: 600px; max-width: 100%; margin-left: auto; margin-right: auto">
                        Anda diharuskan membeli minimal 2 kelas untuk melakukan lamaran pada Lowongan ini. Yuk Beli kelas sekarang!
                    </p>
                    <div class="d-grid flex-column justify-content-center gap-4">
                        <a class="btn btn-secondary" href="{{ route('flash-sale.index') }}"
                            style="border-radius: 40px">Flash Sale</a>
                        <a class="btn btn-primary" href="{{ route('program-kelas.index') }}" style="border-radius: 40px">Katalog Kelas</a>
                    </a>
                       
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>

@endsection