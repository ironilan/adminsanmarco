@extends('layouts.frontend')
@section('contenido')
<section class="page-title centred" style="background-image: url({{ asset('frontend/assets/images/background/page-title-5.jpg') }});">
            <div class="auto-container">
                <div class="content-box">
                    <h1>Contacto</h1>
                    <p>Escríbenos en el siguiente formulario</p>
                </div>
            </div>
        </section>
        <!-- End Page Title -->


        <!-- contact-info-section -->
        <section class="contact-info-section bg-color-1">
            <div class="anim-icon">
                <div class="icon anim-icon-1" style="background-image: url({{ asset('frontend/assets/images/shape/shape-3.png') }});"></div>
                <div class="icon anim-icon-2" style="background-image: url({{ asset('frontend/assets/images/shape/shape-3.png') }});"></div>
            </div>
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                        <div class="single-info-box wow fadeInUp animated animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-Location"></i></div>
                                <h3>Dirección</h3>
                                <p>{{setting()->address}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                        <div class="single-info-box wow fadeInUp animated animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-Phone"></i></div>
                                <h3>Teléfono</h3>
                                <p><a href="tel:{{setting()->cellphone}}">+{{setting()->cellphone}}</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                        <div class="single-info-box wow fadeInUp animated animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-Envelope"></i></div>
                                <h3>Email</h3>
                                <p><a href="mailto:{{setting()->email}}">{{setting()->email}}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-info-section end -->


        <!-- contact-section -->
        <section class="contact-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-lg-5 col-md-12 col-sm-12 content-column">
                        <div class="content_block_5">
                            <div class="content-box">
                                <div class="sec-title">
                                    <p>Contáctanos</p>
                                    <h2>¿Tienes alguna duda?</h2>
                                </div>
                                <div class="text">
                                    <p>{{setting()->texto_contacto}}</p>
                                </div>
                                <ul class="social-links clearfix">
                                    @if (setting()->facebook)
                                    <li>
                                        <a target="_blank" href="{{setting()->facebook}}"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    @endif
                                    @if (setting()->twitter)
                                    <li>
                                        <a target="_blank" href="{{setting()->twitter}}"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    @endif
                                    @if (setting()->instagram)
                                    <li>
                                        <a target="_blank" href="{{setting()->instagram}}"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    @endif
                                    @if (setting()->linkedin)
                                    <li>
                                        <a target="_blank" href="{{setting()->linkedin}}"><i class="fab fa-linkedin"></i></a>
                                    </li>
                                    @endif
                                    @if (setting()->youtube)
                                    <li>
                                        <a target="_blank" href="{{setting()->youtube}}"><i class="fab fa-youtube"></i></a>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12 form-column">
                        <div class="form-inner">
                            <div class="alert alert-success" id="mensajeResponse" style="display: none;">
                                <h4>Se ha enviado correctamente.</h4>
                            </div>
                            <form id="formContact" class="default-form"> 
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="nombre" placeholder="Nombre" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Email" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                        <input type="text" name="celular" required="" placeholder="Celular">
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                        <input type="text" name="asunto" required="" placeholder="Asunto">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="mensaje" placeholder="Mensaje"></textarea>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                        <button class="theme-btn" type="submit" name="submit-form">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection


@section('scripts')

<script>
    $('#formContact').submit(function(e){
        e.preventDefault();
        
        let token = '{{ csrf_token() }}';
        let data = new FormData(document.getElementById("formContact"));
        let url = '{{ url('contacto_send') }}';
        
        $.ajax({
            headers: { 'X-CSRF-TOKEN': token },
            url: url,
            type: 'POST',
            contentType: false,
            data: data,
            processData: false,
            success: res => {
               $('#formContact')[0].reset();
               $('#mensajeResponse').show();
               
            },
            error: error => {
                console.log(error);
            }
        });
    });
</script>
@endsection