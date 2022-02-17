@extends('layouts.app')

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
                                    <span class="card__status">{{ $item->Jeniskelas->jenis_kelas }}, Rp. {{ number_format($item->harga_kelas) }}</span>
                                    <h3 class="card__title">{{ $item->nama_kelas }}</h3>
                                    <span class="card__status"> </span>
                                </div>
                            </div>
                            <p class="card__description">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Asperiores,
                                blanditiis?</p>
                        </div>
                    </a>
                </li>
                @empty
                    
                @endforelse
        </ul>

    </div>



</section>









@endsection
