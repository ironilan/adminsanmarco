@extends('layouts.frontend')
@section('contenido')
<section class="page-title centred" style="background-image: url({{ Storage::url($bg->imagen) }});">
    <div class="auto-container">
        <div class="content-box">
            <h1>Destinos</h1>
            <p>Conoce nuevas experiencias viajando</p>
        </div>
    </div>
</section>


<section class="tours-page-section">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                <div class="item-shorting clearfix">
                    <div class="left-column pull-left">
                        <h3>Lista de destinos</h3>
                    </div>
                    
                </div>
                <div class="wrapper grid">
                    <div class="tour-grid-content">
                        <div class="row clearfix">
                            @foreach ($destinos as $destino)
                            <div class="col-lg-4 col-md-4 col-sm-12 tour-block">
                                <div class="tour-block-one">
                                    <div class="inner-box">
                            <figure class="image-box">
                                <img src="{{Storage::url($destino->imagen)}}" alt="">
                                <a href="{{ route('destino.show', $destino) }}"><i class="fas fa-link"></i></a>
                            </figure>
                            <div class="lower-content">
                                <div class="rating"><span><i class="fas fa-star"></i>{{$destino->estrellas}}</span></div>
                                <h3><a href="{{ route('destino.show', $destino) }}">{{$destino->titulo}}</a></h3>
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
                    
                </div>
                <div class="pagination-wrapper">
                    {{$destinos->links()}}                  
                </div>
            </div>
           
        </div>
    </div>
</section>
@endsection