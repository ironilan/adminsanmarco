@extends('layouts.frontend')
@section('contenido')

	@include('frontend.components.slider')       


    <!-- feature-section -->
    <section class="feature-section centred bg-color-1 sec-pad">
        <div class="auto-container">
            <div class="sec-title text-center">
                <p>{{$inicio->texto_1}}</p>
                <h2>{{$inicio->texto_2}}</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{Storage::url($inicio->imagen_car_1)}}" alt=""></figure>
                            <div class="lower-content">
                                <div class="icon-box">
                                	<img src="{{Storage::url($inicio->icon_car_1)}}" alt="">
                                </div>
                                <h4>{{$inicio->texto_car_1}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated animated" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{Storage::url($inicio->imagen_car_2)}}" alt=""></figure>
                            <div class="lower-content">
                                <div class="icon-box">
                                	<img src="{{Storage::url($inicio->icon_car_2)}}" alt="">
                                </div>
                                <h4>{{$inicio->texto_car_2}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated animated" data-wow-delay="400ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{Storage::url($inicio->imagen_car_3)}}" alt=""></figure>
                            <div class="lower-content">
                                <div class="icon-box">
                                	<img src="{{Storage::url($inicio->icon_car_3)}}" alt="">
                                </div>
                                <h4>{{$inicio->texto_car_3}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 feature-block">
                    <div class="feature-block-one wow fadeInUp animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{Storage::url($inicio->imagen_car_4)}}" alt=""></figure>
                            <div class="lower-content">
                                <div class="icon-box">
                                	<img src="{{Storage::url($inicio->icon_car_4)}}" alt="">
                                </div>
                                <h4>{{$inicio->texto_car_4}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature-section end -->


    <!-- about-section -->
    <section class="about-section">
        <div class="pattern-layer" style="background-image: url({{ asset('frontend/assets/images/shape/shape-2.png') }});"></div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image_block_1">
                        <div class="image-box">
                            <div class="shape">
                                <div class="shape-1" style="background-image: url({{ asset('frontend/assets/images/shape/shape-2.png')}});"></div>
                                <div class="shape-2" style="background-image: url({{ asset('frontend/assets/images/shape/shape-3.png')}});"></div>
                            </div>
                            <figure class="image image-1">
                                <img src="{{Storage::url($nosotros->imagen)}}" alt="">
                                <div class="shape-3" style="background-image: url({{ asset('frontend/assets/images/shape/shape-3.png')}});"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content_block_1">
                        <div class="content-box">
                            <div class="sec-title">
                                <p>{{$nosotros->titulo}}</p>
                                <h2>{{$nosotros->subtitulo}}</h2>
                            </div>
                            <div class="text">
                                <p>{{$nosotros->texto}}</p>
                            </div>
                            <div class="btn-box">
                                <a href="{{ url('contacto') }}" class="theme-btn">Cotizar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-section end -->


    <!-- tour-section -->
    <section class="tour-section bg-color-1 sec-pad">
        <div class="pattern-layer" style="background-image: url({{asset('frontend/assets/images/shape/shape-4.png')}});"></div>
        <div class="auto-container">
            <div class="sec-title text-center">
                <p>Aventura y adrenalina con</p>
                <h2>Destinos Nacionales</h2>
            </div>
            <div class="row clearfix">
                @foreach ($destinos as $destino)
                <div class="col-lg-4 col-md-6 col-sm-12 tour-block">
                    <div class="tour-block-one wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{Storage::url($destino->imagen)}}" alt="">
                                <a href="tour-details.html"><i class="fas fa-link"></i></a>
                            </figure>
                            <div class="lower-content">
                                <div class="rating"><span><i class="fas fa-star"></i>{{$destino->estrellas}}</span></div>
                                <h3><a href="tour-details.html">{{$destino->titulo}}</a></h3>
                                <h4>S/. {{$destino->precio}}<span> / por persona</span></h4>
                                <ul class="info clearfix">
                                    <li><i class="far fa-clock"></i>{{$destino->dias}} Días</li>
                                    <li><i class="far fa-map"></i>{{$destino->lugar}}</li>
                                </ul>
                                {{-- <p>{{$destino->lugar}}</p> --}}
                                <div class="btn-box">
                                    <a href="{{ route('destino.show', $destino) }}">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach                
            </div>
        </div>
    </section>
    <!-- tour-section end -->


    <!-- deals-section -->
    <section class="deals-section" style="background-image: url({{ Storage::url($inicio->imagen_destino_popular) }});">
        <div class="auto-container">
            <div class="content_block_2">
                <div class="content-box">
                    <h3>{{$inicio->titulo_destino_popular}}</h3>
                    <div class="price"><h4>{{$inicio->subtitulo_destino_popular}}</h4></div>
                    <p>{{$inicio->resumen_destino_popular}}</p>
                    <a href="{{$inicio->link}}" class="theme-btn">Ver</a>
                </div>
            </div>
        </div>
    </section>
    <!-- deals-section end -->


    <!-- place-section -->
    <section class="place-section sec-pad">
        <div class="anim-icon">
            <div class="icon anim-icon-1" style="background-image: url({{asset('frontend/assets/images/icons/anim-icon-1.png')}});"></div>
            <div class="icon anim-icon-2" style="background-image: url({{asset('frontend/assets/images/shape/shape-3.png')}});"></div>
            <div class="icon anim-icon-3" style="background-image: url({{asset('frontend/assets/images/shape/shape-3.png')}});"></div>
        </div>
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 title-column">
                    <div class="sec-title">
                        <!-- <p>Conoce nuestros más</p> -->
                        <h2>Destinos Internacionales</h2>
                    </div>
                    <div class="text">
                        <p>Prepárate para la aventura y disfruta conociendo lugares magestuosos.</p>
                    </div>
                </div>
                @foreach ($destinos_internacionales as $inter)
                <div class="col-lg-4 col-md-6 col-sm-12 place-block">
                    <div class="place-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{Storage::url($inter->imagen)}}" alt=""></figure>
                            <div class="text">
                                <h3><a href="{{ route('destino.show', $inter) }}">{{$inter->titulo}}</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
                <div class="col-lg-4 col-md-6 col-sm-12 link-column">
                    <div class="link-box centred">
                        <h3>Encontrar más<br />Destinos</h3>
                        <a href="{{ url('internacional') }}" class="theme-btn">Cotizar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- place-section end -->



@endsection

@section('scripts')
<script>
    
   
</script>
@endsection