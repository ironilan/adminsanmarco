<section class="banner-section" style="background-image: url({{Storage::url($banners->imagen)}});">
    <div class="pattern-layer" style="background-image: url({{asset('frontend/assets/images/shape/shape-1.png')}});"></div>
    <div class="auto-container">
        <div class="content-box">
            <h2>{!!$banners->titulo!!}</h2>
            <p>{{$banners->subtitulo}}</p>
             <a href="{{ url('contacto') }}" class="theme-btn">Cotizar</a>
            
        </div>
    </div>
</section>
