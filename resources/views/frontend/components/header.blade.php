<!-- main header -->
<header class="main-header style-one">
    <!-- header-lower -->
    <div class="header-lower">
        <div class="auto-container">
            <div class="outer-box">
                <div class="logo-box">
                    <figure class="logo"><a href="{{ url('/') }}"><img src="{{Storage::url(setting()->logo_blanco)}}" alt=""></a></figure>
                </div>
                <div class="menu-area clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="<?php echo $page == 'inicio' ? 'current' : '' ?> ">
                                    <a href="{{ url('/') }}">Inicio</a>
                                </li>
                                <li class="<?php echo $page == 'nosotros' ? 'current' : '' ?> ">
                                    <a href="{{ url('nosotros') }}">Nosotros</a>
                                </li>
                                <li class="<?php echo $page == 'destinos' ? 'current' : '' ?> ">
                                    <a href="{{ url('nacional') }}">Nacional</a>
                                </li>
                                <li class="<?php echo $page == 'tours' ? 'current' : '' ?> ">
                                    <a href="{{ url('internacional') }}">Internacional</a>
                                </li>
                                <li class="<?php echo $page == 'contacto' ? 'current' : '' ?> ">
                                    <a href="{{ url('contacto') }}">Contacto</a>
                                </li>   
                            </ul>
                        </div>
                    </nav>
                </div>
                <ul class="menu-right-content clearfix">
                    <li class="search-box-outer">
                        <div class="dropdown">
                            <button class="search-box-btn" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-search"></i></button>
                            <div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu3">
                                <div class="form-container">
                                    <form method="GET" action="{{ url('destinos') }}">
                                        <div class="form-group">
                                            <input type="search" name="criterio" value="" placeholder="Buscar...." required="">
                                            <button type="submit" class="search-btn"><span class="fas fa-search"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                   
                </ul>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="outer-box">
                <div class="logo-box">
                    <figure class="logo"><a href="{{ url('/') }}"><img src="{{Storage::url(setting()->logo)}}" alt=""></a></figure>
                </div>
                <div class="menu-area">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                <ul class="menu-right-content clearfix">
                    <li class="search-box-outer">
                        <div class="dropdown">
                            <button class="search-box-btn" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-search"></i></button>
                            <div class="dropdown-menu search-panel" aria-labelledby="dropdownMenu4">
                                <div class="form-container">
                                    <form >
                                        <div class="form-group">
                                            <input type="search" name="search-field" value="" placeholder="Buscar...." required="">
                                            <button type="submit" class="search-btn"><span class="fas fa-search"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->

<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>
    
    <nav class="menu-box">
        <div class="nav-logo"><a href="{{ url('/') }}"><img src="{{Storage::url(setting()->logo)}}" alt="" title=""></a></div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <div class="contact-info">
            <h4>Contacto</h4>
            <ul>
                <li>{{setting()->title}}</li>
                <li><a href="tel:+{{setting()->cellphone}}">+{{setting()->cellphone}}</a></li>
                <li><a href="mailto:{{setting()->email}}">{{setting()->email}}</a></li>
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
                @if (setting()->facebook)
                <li>
                    <a href="{{setting()->facebook}}" target="_blank">
                        <span class="fab fa-facebook"></span>
                    </a>
                </li>
                @endif        
                @if (setting()->twitter)
                <li>
                    <a href="{{setting()->twitter}}" target="_blank">
                        <span class="fab fa-twitter"></span>
                    </a>
                </li>
                @endif 
                @if (setting()->instagram)
                <li>
                    <a href="{{setting()->instagram}}" target="_blank">
                        <span class="fab fa-instagram"></span>
                    </a>
                </li>
                @endif 
                @if (setting()->linkedin)
                <li>
                    <a href="{{setting()->linkedin}}" target="_blank">
                        <span class="fab fa-linkedin"></span>
                    </a>
                </li>
                @endif 
                @if (setting()->youtube)
                <li>
                    <a href="{{setting()->youtube}}" target="_blank">
                        <span class="fab fa-youtube"></span>
                    </a>
                </li>
                @endif 
            </ul>
        </div>
    </nav>
</div><!-- End Mobile Menu -->