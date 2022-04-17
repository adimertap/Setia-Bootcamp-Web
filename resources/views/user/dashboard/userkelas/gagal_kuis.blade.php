@extends('layouts.UserDashboard.userdashlayout')

@section('content')
<section class="py-5">
    <main>
        <div class="container">
            <div class="row justify-content-center empty-state">
                <div class="col-lg-12 col-10 text-center">
                    @if(session('messageberhasil'))
                    <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                        {{ session('messageberhasil') }}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    @if(session('messagegagal'))
                    <div class="alert alert-danger" role="alert"> <i class="fas fa-check"></i>
                        {{ session('messagegagal') }}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    <img src="{{asset('images/sorry.png')}}" width="500" height="500" alt="" class="mb-5 img-fluid">
                    <h1 class="mb-3">
                        Score Kuis Anda {{ $detail->nilai_kuis }}/{{ $detail->nilai_max }} 
                    </h1>
                    <p class="subtitle-primary mb-5"
                        style="width: 600px; max-width: 100%; margin-left: auto; margin-right: auto">
                        Mohon maaf, anda dinyatakan belum lulus pada kelas <strong>{{ $detail->Kelas->nama_kelas }}</strong>, ulangi kuis untuk menyelesaikan kelas dan mendapatkan sertifikat,
                    </p>
                    <div class="d-grid flex-column justify-content-center gap-4">
                        <a class="btn btn-primary" href="{{ route('kelas-saya-kuis', $detail->Kelas->id_kelas) }}" style="border-radius: 40px">Ulangi Kuis</a>

                        </a>

                    </div>
                </div>
            </div>
        </div>
    </main>
</section>





<script>
    window.onload = function () {
        document.getElementById("sidenavAccordion").style.display = "none";
        var button = document.getElementById('sidebarToggle');
        button.click();
    }

</script>

@endsection
