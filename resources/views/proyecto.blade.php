@extends('layouts.frontend')
@section('contenido')
<section class="app_banner_serv ">
    <div class="page-header black-overlay app_header_service" style="background-image: url({{Storage::url($bg->imagen)}});">
        <div class="container breadcrumb-section">
            <h4 class="cursiva cn">{{$bg->titulo}} / <small class="ca">{{$categoria->titulo}}</small></h4>
        </div>
    </div>
</section>
<div class="wa-project-main project-col4 padTB100">
            <div class="container">
                <div class="row">
                    
                   
                </div>
                <div class="row" id="MixItUp1">
                    <!--//==project Item==//-->
                    @foreach ($categoria->proyectos as $value)
                    <div class="col-lg-3 col-lg-offset-0 col-md-3 col-md-offset-0 col-sm-4 col-sm-offset-0 col-xs-12 col-xs-offset-0 cat1 mix">
                        <div class="wa-project">
                            <div class="wa-project-thumbnail wa-item">
                                <img src="{{Storage::url($value->imagen)}}" alt="">
                                <div class="caption">
                                    <div class="caption-text">
                                        <ul class="wa-project-icon">
                                            <!-- <li><a href="assets/img/project/img1.jpg" class="fancybox" data-fancybox-group="group"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li> -->
                                            <li><a href="#"><i class="fa fa-link" aria-hidden="true"></i></a></li>
                                            <!-- <li><a href=""><i class="fa fa-heart-o" aria-hidden="true"></i></a></li> -->
                                        </ul>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="wa-project-caption">
                                <h2>
                                    <a href="lista_productos.php"><?php echo $value['titulo'] ?></a>
                                </h2>
                                <div class="clear"></div>
                                <h5><?php echo $value['subtitulo'] ?></h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    
                    <div class="clear"></div>
                </div>
            </div>
        </div>

@endsection

