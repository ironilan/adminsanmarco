<?php $page='index' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="keywords" content="{{setting()->keywords}}">
    <meta name="description" content="{{setting()->description}}">
    <title>{{setting()->title}}</title>

    <!-- Fav Icon -->
    <link rel="icon" href="{{asset('frontend/assets/images/favicon.png')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{asset('frontend/assets/css/font-awesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/owl.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/jquery.fancybox.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/nice-select.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/jquery-ui.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/color.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/estilos.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('frontend/plugins/whatsapp_chat_support/plugin/whatsapp-chat-support.css')}}">

    <style>
        .wcs_fixed_right{
            bottom:  122px!important;
        }

        .wcs_button_circle span{
            font-size: 2.8rem!important;
            padding: 4px!important;
        }

        .wcs_popup_person_status{
            line-height: 13px!important;
        }
    </style>

</head>

<!-- page wrapper -->
<body>

    <div class="boxed_wrapper">


        <!-- preloader -->
        <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close">Cerrar</div>
                <div id="handle-preloader" class="handle-preloader">
                    <div class="animation-preloader">
                        <div class="spinner"></div>
                        
                    </div>  
                </div>
            </div>
        </div>
        <!-- preloader end -->


        @include('frontend.components.header')

        
        @yield('contenido')

     

        @include('frontend.components.footer')
        



        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fal fa-angle-up"></span>
        </button>
    </div>


    <!-- jequery plugins -->
    <script src="{{asset('frontend/assets/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/owl.js')}}"></script>
    <script src="{{asset('frontend/assets/js/wow.js')}}"></script>
    <script src="{{asset('frontend/assets/js/validation.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('frontend/assets/js/appear.js')}}"></script>
    <script src="{{asset('frontend/assets/js/scrollbar.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/jquery-ui.js')}}"></script>

    @yield('maps')
    <!-- main-js -->
    <script src="{{asset('frontend/assets/js/script.js')}}"></script>

    <script src="{{asset('frontend/plugins/whatsapp_chat_support/plugin/components/moment/moment.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/whatsapp_chat_support/plugin/components/moment/moment-timezone-with-data.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/whatsapp_chat_support/plugin/whatsapp-chat-support.js')}}"></script>

    <script type="text/javascript">
  

        $('#example_1').whatsappChatSupport();


        const abriWapp = () => {
            $('.wcs_button_circle').click();
        }
     
    </script>

    @yield('scripts')

</body><!-- End of .page_wrapper -->

</html>
