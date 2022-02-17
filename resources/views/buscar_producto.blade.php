@extends('layouts.frontend')

@section('contenido')

<div class="breadcrumbs_area">
    <div class="container">   
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <ul>
                        <li><a href="{{ url('/') }}">Inicio</a></li>
                        <li>Productos</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>         
</div>


<!--shop  area start-->
<div class="shop_area shop_fullwidth">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!--shop banner area start-->
                <div class="shop_banner_area mb-30">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop_banner_thumb">
                                <img src="{{ asset('assets/img/bg/banner23.jpg') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <!--shop banner area end-->
                <!--shop toolbar start-->
                
                 <!--shop toolbar end-->
                 <div class="row shop_wrapper">
                 	@foreach ($productos['data'] as $prodv)
                    <div class="col-lg-3 col-md-4 col-12 ">
                    	
                    	<article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{ route('productos.show', $prodv['slug']) }}"><img src="{{$prodv['imagen']}}" alt=""></a>
                                    @if ($prodv['imagenes'])
                                   	<a class="secondary_img" href="{{ route('productos.show', $prodv['slug']) }}"><img src="{{$prodv['imagenes'][0]['imagen']}}" alt=""></a>
                                    @endif
                                    <div class="label_product">
                                        <span class="label_sale">@if ($prodv['nuevo'] == 'si')
                                        	nuevo
                                        @endif</span>
                                    </div>
                                    <div class="quick_button">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box"  title="quick view"><i class="icon-eye"></i></a>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_content_inner">
                                        <p class="manufacture_product"><a href="#">{{$prodv['servicio_es']}}</a></p>
                                        <h4 class="product_name"><a href="{{ route('productos.show', $prodv['slug']) }}">{{$prodv['titulo_es']}}</a></h4>
                                        <div class="product_rating">
                                           <ul>
                                               @if ($prodv['estrellas'] == 1)
                                               <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                               @endif
                                               @if ($prodv['estrellas'] == 2)
                                               <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                               <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                               @endif
                                               @if ($prodv['estrellas'] == 3)
                                               <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                               <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                               <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                               @endif
                                               @if ($prodv['estrellas'] == 4)
                                               <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                               <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                               <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                               <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                               @endif
                                               @if ($prodv['estrellas'] == 5)
                                               <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                               <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                               <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                               <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                               <li><a href="#"><i class="ion-android-star-outline"></i></a></li>       
                                               @endif
                                           </ul>
                                        </div>
                                    </div> 
                                    <div class="action_links">
                                         <ul>
                                            <li class="add_to_cart"><a href="{{ route('productos.show', $prodv['slug']) }}" title="Cotizar">Cotizar</a></li>  
                                        </ul>
                                    </div>  
                                </div>
                            </figure>
                        </article>
                    	
                        
                    </div>
                    @endforeach
                </div>

                

                <div class="shop_toolbar t_bottom">
                    @include('components.pagination_buscar')
                </div>
                <!--shop toolbar end-->
                <!--shop wrapper end-->
            </div>
        </div>
    </div>
</div>
@endsection
