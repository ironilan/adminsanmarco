@extends('layouts.frontend')
@section('contenido')

<section class="page-title centred" style="background-image: url({{Storage::url($banner->imagen)}});">
    <div class="auto-container">
        <div class="content-box">
            <h1>Nosotros</h1>
            <p>{{$banner->titulo}}</p>
        </div>
    </div>
</section>
<!-- End Page Title -->


        <!-- about-style-two -->
        <section class="about-style-two">
            <div class="pattern-layer" style="background-image: url({{asset('frontend/assets/images/shape/shape-2.png')}}"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_1">
                            <div class="content-box">
                                <div class="sec-title">
                                    <p>{{$nosotros->titulo}}</p>
                                    <h2>{{$nosotros->subtitulo}}</h2>
                                </div>
                                <div class="text">
                                    <p class="text-justify">
                                        {{$nosotros->texto}}
                                    </p>
                                </div>
                                <div class="btn-box">
                                    <a href="{{ url('contacto') }}" class="theme-btn">Cotizar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image_block_2">
                            <div class="image-box">
                                <div class="shape">
                                    <div class="shape-1" style="background-image: url({{asset('frontend/assets/images/shape/shape-13.png')}}"></div>
                                    <div class="shape-2" style="background-image: url({{asset('frontend/assets/images/shape/shape-12.png')}}"></div>
                                    <div class="shape-3" style="background-image: url({{asset('frontend/assets/images/shape/shape-12.png')}}"></div>
                                </div>
                                <figure class="image"><img src="{{Storage::url($nosotros->imagen)}}" alt=""></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about-style-two end -->


        <section class="app_vi_mi">
            <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-2.png);"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_1">
                            <div class="content-box">
                                <div class="sec-title">
                                    <h2>{{$nosotros->titulo_vision}}</h2>
                                </div>
                                <div class="text">
                                    <p>{{$nosotros->vision}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_1">
                            <div class="content-box">
                                <div class="sec-title">
                                    <h2>{{$nosotros->titulo_mision}}</h2>
                                </div>
                                <div class="text">
                                    <p>{{$nosotros->mision}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- place-style-three -->
        <section class="place-style-three bg-color-1 sec-pad">
            <div class="anim-icon">
                <div class="icon anim-icon-1" style="background-image: url({{ asset('frontend/assets/images/shape/shape-18.png') }});"></div>
                <div class="icon anim-icon-2" style="background-image: url({{ asset('frontend/assets/images/shape/shape-18.png') }});"></div>
            </div>
            <div class="auto-container">
                <div class="sec-title centred">
                    <p>Mira nuestros </p>
                    <h2>Destinos más populares</h2>
                </div>
                <div class="row clearfix">
                    <div class="three-item-carousel owl-carousel owl-theme owl-nav-none dots-style-one">
                        @foreach ($destinos as $destino)
                        <div class="place-block-two">
                            <a href="{{ route('destino.show', $destino) }}">
                                <div class="inner-box">
                                    <figure class="image-box"><img src="{{Storage::url($destino->imagen)}}" alt=""></figure>
                                    <div class="text">
                                        <h3>{{$destino->titulo}}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </section>

@endsection