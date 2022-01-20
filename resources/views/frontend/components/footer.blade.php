<!-- main-footer -->
        <footer class="main-footer bg-color-2">
            <div class="footer-top">
                <div class="vector-bg" style="background-image: url({{asset('frontend/assets/images/shape/shape-11.png')}});"></div>
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget logo-widget">
                                <figure class="footer-logo"><a href="index-2.html"><img src="{{Storage::url(setting()->logo_footer)}}" alt="" style="width: 150px;"></a></figure>
                                <div class="text">
                                    <p>{{setting()->texto_footer}}</p>
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
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget links-widget">
                                <div class="widget-title">
                                    <h3>Mapa de sitio</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="links-list clearfix">
                                        <li><a href="{{ url('nosotros') }}">Nosotros</a></li>
                                        <li><a href="{{ url('nacional') }}">Nacional</a></li>
                                        <li><a href="{{ url('internacional') }}">Internacional</a></li>
                                        <li><a href="{{ url('contacto') }}">Contacto</a></li>
                                        <li><a href="{{ url('suscribirse') }}">Suscribirse</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget gallery-widget">
                                <div class="widget-title">
                                    <h3>Galería</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="image-list clearfix">
                                        @foreach (galeria() as $gal)
                                        <li>
                                            <figure class="image-box">
                                                <a href="#">
                                                    <img src="{{Storage::url($gal->imagen)}}" alt="">
                                                </a>
                                            </figure>
                                        </li>
                                        @endforeach                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget contact-widget">
                                <div class="widget-title">
                                    <h3>Contacto</h3>
                                </div>
                                <div class="widget-content">
                                    <ul class="info-list clearfix">
                                        <li><i class="fas fa-map-marker-alt"></i>{{setting()->address}}</li>
                                        <li><i class="fas fa-microphone"></i><a href="tel:{{setting()->cellphone}}">{{setting()->cellphone}}</a></li>
                                        <li><i class="fas fa-envelope"></i><a href="mailto:{{setting()->email}}">{{setting()->email}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="bottom-inner clearfix">
                        <div class="copyright pull-left">
                            <p><a href="#">{{setting()->title}}</a> &copy; <?php echo Date('Y') ?> All Right Reserved</p>
                        </div>
                        <ul class="footer-nav pull-right">
                            <li><a href="{{ url('terminos') }}">Terminos y conidiciones</a></li>
                            <li><a href="{{ url('politicas') }}">Políticas de privacidad</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->

<div class="whatsapp_chat_support wcs_fixed_right" id="example_1">
    <div class="wcs_button_label">
        ¿Tienes alguna duda?
    </div>  
    <div class="wcs_button wcs_button_circle">
        <span class="fab fa-whatsapp app_whapp_support" style="font-size: 46px;"> </span>
    </div>  

    <div class="wcs_popup">
        <div class="wcs_popup_close">
            <span class="fa fa-times "></span>
        </div>
        <div class="wcs_popup_content">
            <div class="wcs_popup_header">
                <strong>Escríbenos aquí</strong>
                <br>
                <div class="wcs_popup_header_description">Click en alguna de las siguientes burbujas</div>
            </div>  
            <div class="wcs_popup_person_container">
                @foreach (whapp() as $wapp)
                <div class="wcs_popup_person" data-number="{{$wapp->whatsapp}}" data-default-msg="{{$wapp->mensaje}}">
                    <div class="wcs_popup_person_img"><img src="{{Storage::url($wapp->imagen)}}" alt=""></div>
                    <div class="wcs_popup_person_content">
                        <div class="wcs_popup_person_name">{{$wapp->nombre}}</div>
                        <div class="wcs_popup_person_description">{{$wapp->area}}</div>
                        <div class="wcs_popup_person_status">Estoy en línea</div>
                    </div>  
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</div>