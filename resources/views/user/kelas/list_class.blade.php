@extends('layouts.app')

@section('name')
Class Program Bootcamp
@endsection

@section('content')


<section class="banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-12 text-center">
                <h1>
                    Katalog <span class="text-purple">Program Kelas</span>
                </h1>
                <p class="support">
                    Pelajari ilmu terbaru dari mentor yang <br> berpengalaman di bidangnya
                </p>
            </div>

            <div class="search-wrapper text-center">
                <form>
                    <input type="text" name="focus" required class="search-box"
                        placeholder="Cari Kelas yang Anda Minati" />
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <ul class="cards">
                @forelse ($kelas as $item)
                <li class="mb-5">
                    <a href="{{ route('program-kelas.show', $item->id_kelas) }}" class="card-class shadow-6dp">
                        <img src="{{ asset('/image/'.$item['cover_kelas']) }}" class="card__image" alt="" />
                        <div class="card__overlay">
                            <div class="card__header">
                                <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                                    <path /></svg>
                                <img class="card__thumb" src="{{ asset('/image/'.$item['avatar']) }}" alt="" />
                                <div class="card__header-text">
                                    <span class="card__status">{{ $item->Jeniskelas->jenis_kelas }}, {{ $item->Level->nama_level }}</span>
                                    <h3 class="card__title">{{ $item->nama_kelas }}</h3>
                                    @if (count($item->Detaildiskon) != '0')
                                        <span class="card__status">Flash Sale Class <span style="color: red">{{ $item->Detaildiskon[0]->Diskon->jumlah_diskon }}% Off</span> </span>
                                    @else
                                       
                                    @endif
                                    
                                </div>
                                @if (count($item->Detaildiskon) == '0')
                                    <h6 style="color: grey">{{ number_format($item->harga_kelas) }}</h6>
                                @else
                                    <h6 style="color: red"><u>{{ number_format($item->harga_kelas - $item->harga_kelas * $item->Detaildiskon[0]->Diskon->jumlah_diskon / 100) }}</u></h6>
                                @endif
                                {{-- <h6 style="color: grey">Cuma {{ number_format($item->harga_kelas) }} </h6> --}}
                            </div>
                            <p class="card__description">Kelas ini ditunjukan untuk kamu yang ingin menambah portofolio dan mempelajari mengenai {{ $item->nama_kelas }}</p>
                        </div>
                    </a>
                </li>
                @empty
                    
                @endforelse

        </ul>

    </div>



</section>









@endsection
