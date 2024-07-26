<!DOCTYPE html>
<html class="no-js">

<head>

    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title>PHP</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('frontend/content/carwash/images/favicon.ico') }}">

    <!-- FONTS -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,400italic,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Patua+One:100,300,400,400italic,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic,900'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Poppins:100,300,400,400italic,500,600,700,700italic'>

    <!-- CSS -->
    <link rel='stylesheet' href="{{ asset('frontend/css/global.css') }}">
    <link rel='stylesheet' href='{{ asset('frontend/content/carwash/css/structure.css') }}'>
    <link rel='stylesheet' href='{{ asset('frontend/content/carwash/css/carwash.css') }}'>
    <link rel='stylesheet' href='{{ asset('frontend/content/carwash/css/custom.css') }}'>

    <!-- Revolution Slider -->
    <link rel="stylesheet" href="{{ asset('frontend/plugins/rs-plugin/css/settings.css') }}">

</head>

<body class="button-flat layout-boxed if-overlay no-content-padding table-responsive header-classic header-boxed minimalist-header-no sticky-header sticky-tb-color ab-hide subheader-both-center menu-line-below-80-1 menuo-no-borders menuo-right logo-no-margin logo-overflow mobile-tb-center mobile-side-slide mobile-mini-mr-ll tablet-sticky mobile-header-mini mobile-sticky">
    <div id="Wrapper">
        @include('frontend.components.header')
        <div id="Content">
            @yield('content')
        </div>
        @include('frontend.components.footer')
    </div>

    <!-- side menu -->
    <div id="Side_slide" class="right dark" data-width="250">
        <div class="close-wrapper">
            <a href="#" class="close"><i class="icon-cancel-fine"></i></a>
        </div>
        <div class="menu_wrapper"></div>
    </div>
    <div id="body_overlay"></div>

    <!-- JS -->
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery-migrate-3.3.2.js') }}"></script>

    <script src="{{ asset('frontend/js/mfn.menu.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.plugins.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.jplayer.min.js') }}"></script>
    <script src="{{ asset('frontend/js/animations/animations.js') }}"></script>
    <script src="{{ asset('frontend/js/translate3d.js') }}"></script>
    <script src="{{ asset('frontend/js/scripts.js') }}"></script>

    <script src="{{ asset('frontend/plugins/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

    <script src="{{ asset('frontend/plugins/rs-plugin/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/rs-plugin/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/rs-plugin/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/rs-plugin/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/rs-plugin/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/rs-plugin/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/rs-plugin/js/extensions/revolution.extension.parallax.min.js') }}"></script>

    <script>
        var revapi1, tpj = jQuery;
		  tpj(document).ready(function() {
			  if (tpj("#rev_slider_1_1").revolution == undefined) {
				  revslider_showDoubleJqueryError("#rev_slider_1_1");
			  } else {
				  revapi1 = tpj("#rev_slider_1_1").show().revolution({
					  sliderType :"hero",
					  sliderLayout :"auto",
					  dottedOverlay :"none",
					  delay : 9000,
					  visibilityLevels : [1240, 1024, 778, 480],
					  gridwidth : 1240,
					  gridheight : 590,
					  lazyType :"none",
					  shadow : 0,
					  spinner :"spinner2",
					  autoHeight :"off",
					  disableProgressBar :"on",
					  hideThumbsOnMobile :"off",
					  hideSliderAtLimit : 0,
					  hideCaptionAtLimit : 0,
					  hideAllCaptionAtLilmit : 0,
					  debugMode : false,
					  fallbacks : {
						  simplifyAll :"off",
						  disableFocusListener : false,
					  }
				  });
			  }
		  });
    </script>


</body>

</html>