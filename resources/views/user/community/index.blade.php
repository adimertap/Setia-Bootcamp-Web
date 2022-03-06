@extends('layouts.app')

@section('name')
Community Bootcamp
@endsection

@section('content')
<main>
  
        <section class="pricing" style="margin-top: 0px">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-5 col-12 header-wrap copywriting">
                        <p class="story">
                            GOOD INVESTMENT
                        </p>
                        <h2 class="primary-header text-white">
                            Cari Lowongan
                        </h2>
                        <p class="support">
                            Learn how to speaking in public to demonstrate your <br> final project and receive the important feedbacks
                        </p>
                        <p class="mt-5">
                            <a href="#carilowongan" class="btn btn-master btn-thirdty me-3">
                                Yuk Cari
                            </a>
                        </p>
                    </div>
                    <div class="col-lg-7 col-12 ">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <div class="text-center">
                                    <img src="{{asset('image/job.png')}}" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pb-70">
                    <div class="col-lg-12 col-12 text-center">
                        <img src="{{asset('images/brands.png')}}" height="30" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="testimonials" style="margin-top: 0px" id="carilowongan">
            <div class="container-fluid">
                <div class="row text-center pb-70">
                    <div class="col-lg-12 col-12 header-wrap">
                        <p class="story">
                            SUCCESS STUDENTS
                        </p>
                        <h2 class="primary-header">
                            List Lowongan Pekerjaan
                        </h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-12">
                        <div class="row">
                            <div class="col-lg-3 col-12">
                                <div class="item-review">
                                    <div class="user">
                                        <img src="{{asset('images/fanny_photo.png')}}" class="photo" alt="">
                                        <div class="info">
                                            <h4 class="name">
                                                Fanny
                                            </h4>
                                            <p class="role">
                                                Developer at Google
                                            </p>
                                        </div>
                                    </div>
                                    <p class="message">
                                        I was not really into code but after they teach me how to train my logic then I was really fall in love with code
                                    </p>
                                    
                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="item-review">
                                    <img src="{{asset('images/stars.svg')}}" alt="">
                                    <p class="message">
                                        I was not really into code but after they teach me how to train my logic then I was really fall in love with code
                                    </p>
                                    <div class="user">
                                        <img src="{{asset('images/fanny_photo.png')}}" class="photo" alt="">
                                        <div class="info">
                                            <h4 class="name">
                                                Fanny
                                            </h4>
                                            <p class="role">
                                                Developer at Google
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="item-review">
                                    <img src="{{asset('images/stars.svg')}}" alt="">
                                    <p class="message">
                                        Code is really important if we want to build a company and strike to the win
                                    </p>
                                    <div class="user">
                                        <img src="{{asset('images/angga.png')}}" class="photo" alt="">
                                        <div class="info">
                                            <h4 class="name">
                                                Angga
                                            </h4>
                                            <p class="role">
                                                CEO at BWA Corp
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-12">
                                <div class="item-review">
                                    <img src="{{asset('images/stars.svg')}}" alt="">
                                    <p class="message">
                                        My background is design and art but I do really love how to make my design working in the development phase
                                    </p>
                                    <div class="user">
                                        <img src="{{asset('images/beatrice.png')}}" class="photo" alt="">
                                        <div class="info">
                                            <h4 class="name">
                                                Beatrice
                                            </h4>
                                            <p class="role">
                                                QA at Facebook
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row copyright">
                            <div class="col-lg-12 col-12">
                                <p>
                                    All Rights Reserved. Copyright PT Setia Mandiri Perkasa.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
   




</main>





@endsection