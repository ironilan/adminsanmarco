@extends('layouts.frontend')
@section('contenido')
<!-- Page Title -->
<section class="page-title style-three" style="background-image: url({{Storage::url($destino->banner)}});">
    <div class="auto-container">
        <div class="inner-box">
            <div class="rating"><span><i class="fas fa-star"></i>{{$destino->estrellas}}</span></div>
            <h2>{{$destino->titulo}}</h2>
            <h3>S/. {{$destino->precio}}<span> / Por persona</span></h3>
        </div>
    </div>
</section>
<!-- End Page Title -->


<!-- tour-details -->
<section class="tour-details">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="tour-details-content">
                    <div class="inner-box">
                        <div class="text">
                            <h2>Descripción</h2>
                            <p>{!!$destino->descripcion!!}</p>
                            <ul class="info-list clearfix">
                                <li><i class="far fa-clock"></i>{{$destino->dias}} Días</li>
                                <li><i class="far fa-star"></i>{{$destino->estrellas}} Estrellas</li>
                                <li><i class="far fa-map"></i>{{$destino->lugar}}</li>
                            </ul>
                        </div>
                    </div>
                    @if ($destino->incluyes)
                    <div class="overview-inner">
                        <ul class="overview-list clearfix">
                            <li class="clearfix"><span>Incluye:</span>
                                <ul class="included-list clearfix">
                                    @foreach ($destino->incluyes as $inc)
                                    <li>{{$inc->titulo}}</li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                    @endif
                    @if ($destino->plans)
                    <div class="tour-plan">
                        <div class="text">
                            <h2>Itinerario</h2>
                            <p>Aquí puedes ver el itinerario del viaje.</p>
                        </div>
                        <div class="content-box">
                            
                            
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($destino->plans as $plan)
                            <div class="single-box">
                                <span>{{$i}}</span>
                                <h4>{{$plan->hora}}</h4>
                                <h3>{{$plan->titulo}}</h3>
                                <p>{{$plan->descripcion}}</p>
                            </div>
                            @php
                                $i++;
                            @endphp
                            @endforeach
                            
                                                       
                        </div>
                    </div>
                    @endif 
                    @if ($destino->ubicacion)
                    <div class="location-map">
                        <div class="text">
                            <h2>Míralo en el mapa</h2>
                            <p>La ubicación del destino se puede ver a continuación.</p>
                        </div>
                        <div class="map-inner">
                            {!!$destino->ubicacion!!}
                        </div>
                    </div>
                    @endif
                    @if ($destino->galerias)
                    <div class="photo-gallery">
                        <div class="text">
                            <h2>Galería</h2>
                            <p>Estas son algunas fotos del lugar que visitarás.</p>
                        </div>
                        <div class="image-box clearfix">
                            @foreach ($destino->galerias as $gal)
                            <figure class="image">
                                <img src="{{Storage::url($gal->imagen)}}" alt="">
                                <a href="{{Storage::url($gal->imagen)}}" class="view-btn lightbox-image" data-fancybox="gallery"><i class="icon-Plus"></i></a>
                            </figure>   
                            @endforeach                         
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="default-sidebar tour-sidebar ml-20">
                    <div class="form-widget">
                        <div class="widget-title">
                            <h3>¿Te interesa?</h3>
                        </div>
                        <div class="alert alert-success" id="mensajeResponse" style="display: none;">
                            <h4>Se ha enviado correctamente.</h4>
                        </div>
                        <form id="formDestino"  method="post" class="tour-form">
                            <input type="hidden" value="{{$destino->titulo}}" name="destino">
                            <div class="form-group">
                                <input type="text" name="nombre" placeholder="Nombre" required="">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Email" required="">
                            </div>
                            <div class="form-group">
                                <input type="text" name="celular" placeholder="Celular" required="">
                            </div>
                            
                            <div class="form-group">
                                <textarea name="mensaje" placeholder="Mensaje"></textarea>
                            </div>
                            <div class="form-group message-btn">
                                <button type="submit" class="theme-btn">Enviar</button>
                            </div>
                        </form>
                    </div>
                    @if ($destino->archivos)
                    <div class="sidebar-widget downloads-widget">
                        <div class="widget-title">
                            <h3>Archivos</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="download-links clearfix">
                                @foreach ($destino->archivos as $archivo)
                                <li><a href="{{ url('descargar') }}?id={{$archivo->id}}">{{$archivo->titulo}}<i class="fas fa-download"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- tour-details end -->
@endsection


@section('scripts')
<script type="text/javascript">
    $('#formDestino').submit(function(e){
        e.preventDefault();
        
        let token = '{{ csrf_token() }}';
        let data = new FormData(document.getElementById("formDestino"));
        let url = '{{ url('destino_send') }}';
        
        $.ajax({
            headers: { 'X-CSRF-TOKEN': token },
            url: url,
            type: 'POST',
            contentType: false,
            data: data,
            processData: false,
            success: res => {
               $('#formDestino').hide();
               $('#mensajeResponse').show();
            },
            error: error => {
                console.log(error);
            }
        });
    });
</script>
@endsection


