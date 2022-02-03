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

    <div class="container-fluid">
        <ul class="cards">
            <li>
                <a href="" class="card shadow-6dp">
                    <img src="{{asset('images/kelas1.png')}}" class="card__image" alt="" />
                    <div class="card__overlay">
                        <div class="card__header">
                            <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                                <path /></svg>
                            <img class="card__thumb" src="{{ asset('images/user_photo.png') }}" alt="" />
                            <div class="card__header-text">
                                <h3 class="card__title">Jessica Parker</h3>
                                <span class="card__status">1 hour ago</span>
                            </div>
                        </div>
                        <p class="card__description">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Asperiores,
                            blanditiis?</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="" class="card shadow-6dp">
                    <img src="{{asset('images/kelas2.jpg')}}" class="card__image" alt="" />
                    <div class="card__overlay">
                        <div class="card__header">
                            <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                                <path /></svg>
                            <img class="card__thumb" src="{{ asset('images/beatrice.png') }}" alt="" />
                            <div class="card__header-text">
                                <h3 class="card__title">kim Cattrall</h3>
                                <span class="card__status">3 hours ago</span>
                            </div>
                        </div>
                        <p class="card__description">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Asperiores,
                            blanditiis?</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="" class="card shadow-6dp">
                    <img src="{{asset('images/kelas3.png')}}" class="card__image" alt="" />
                    <div class="card__overlay">
                        <div class="card__header">
                            <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                                <path /></svg>
                            <img class="card__thumb" src="{{ asset('images/angga.png') }}" alt="" />
                            <div class="card__header-text">
                                <h3 class="card__title">kim Cattrall</h3>
                                <span class="card__status">3 hours ago</span>
                            </div>
                        </div>
                        <p class="card__description">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Asperiores,
                            blanditiis?</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="" class="card shadow-6dp">
                    <img src="{{asset('images/kelas4.png')}}" class="card__image" alt="" />
                    <div class="card__overlay">
                        <div class="card__header">
                            <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                                <path /></svg>
                            <img class="card__thumb" src="{{ asset('images/fanny_photo.png') }}" alt="" />
                            <div class="card__header-text">
                                <h3 class="card__title">kim Cattrall</h3>
                                <span class="card__status">3 hours ago</span>
                            </div>
                        </div>
                        <p class="card__description">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Asperiores,
                            blanditiis?</p>
                    </div>
                </a>
            </li>
        </ul>

    </div>



</section>









@endsection
