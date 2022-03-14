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
                    <span class="text-purple">Flash Sale!</span>
                </h1>
                <p class="support">
                    Temukan berbagai kelas yang sedang <br> promosi potongan harga
                </p>
            </div>
        </div>
    </div>
    <div class="container">
        <ul class="cards_flash">
           
            @forelse ($kelas as $item)
            <li class="mb-5">
                <a href="{{ route('program-kelas.show', $item->Kelas->id_kelas) }}" class="card-class shadow-6dp">
                    <img src="{{ asset('/image/'.$item->Kelas['cover_kelas']) }}" class="card__image" alt="" />
                    <div class="card__overlay">
                        <div class="card__header">
                            <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">

                            </svg>

                            <div class="card__header-text">
                                <span class="card__status">{{ $item->Kelas->Jeniskelas->jenis_kelas }}</span>
                                <h5 style="color: black">{{ $item->Kelas->nama_kelas }}</h5>
                                <span class="card__status">Flash Sale Class <span style="color: red">{{ $item->jumlah_diskon }}% Off</span> </span>
                            </div>
                            <h5 style="color: red"><s>{{ number_format($item->Kelas->harga_kelas) }}</s> </h5>
                            <h5 style="color: gray">{{ number_format($item->harga_kelas - $item->jumlah_diskon * $item->harga_kelas / 100) }} </h5>
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
