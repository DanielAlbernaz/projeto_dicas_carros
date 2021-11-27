<!DOCTYPE html>
<html dir="ltr" lang="pt-BR">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="Daniel Albernaz" content="SemiColonWeb" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Mukta+Vaani:300,400,500,600,700|Open+Sans:300,400,600,700,800,900&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/dark.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/swiper.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/font-icons.css')}}" type="text/css" />
	<!-- Bootstrap Select CSS -->
	<link rel="stylesheet" href="{{asset('css/components/bs-select.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/components/bs-switches.css')}}" type="text/css" />

	<!-- car Specific Stylesheet -->
	<link rel="stylesheet" href="{{asset('css/car/car.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/car/car-icons/style.css')}}" type="text/css" />
	<!-- / -->

	<link rel="stylesheet" href="{{asset('css/animate.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css" />

	<link rel="stylesheet" href="{{asset('css/car/fonts.css')}}" type="text/css" />

	<link rel="stylesheet" href="{{asset('css/custom.css')}}" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" href="{{asset('css/colors.php?color=1abc9c')}}" type="text/css" />

	<!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
	<link rel="stylesheet" type="text/css" href="{{asset('css/include/settings.css')}}" media="screen" />
	<link rel="stylesheet" type="text/css" href="{{asset('css/include/layers.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/include/navigation.css')}}">

	<link rel="shortcut icon" type="imagex/png" href="{{asset('imagens/icone.png')}}">

	<!-- Document Title -->
	<title>Dicas | Veículos</title>

</head>

<body class="stretched side-push-panel">

	<!-- Side Panel Overlay -->
	<div class="body-overlay"></div>
	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="full-header header-size-custom" data-sticky-shrink="false">
			<div id="header-wrap">
				<div class="container-fluid">
					<div class="header-row flex-lg-row-reverse">

						<!-- Barra superior-->
						<div id="" class="me-lg-0 ms-lg-auto">
							<ul class="menu-container">
                                @if (!Auth::check())
                                    <li class="menu-item"><a class="menu-link" href="{{ route('login') }}"><div>Entrar</div></a></li>
                                    <li class="menu-item"><a class="menu-link" href="{{ route('register') }}"><div>Registrar</div></a></li>
                                @endif
                                @if (Auth::check())
                                    <li class="menu-item"><a class="menu-link" href=""><div>Bem vindo, {{Auth::user()->name}} | </div></a></li>
                                    <li class="menu-item"><a class="menu-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="{{ route('logout') }}">
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"  class="d-none">
                                                @csrf
                                            </form>
                                            <div>Sair</div>
                                        </a>
                                    </li>
                                @endif
							</ul>
						</div>

						<div id="primary-menu-trigger">
							<svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
						</div>

						<!-- Primary Navigation -->
						<nav class="primary-menu with-arrows">
							<ul class="menu-container">
								<li class="menu-item current"><a class="menu-link" href="/"><div>Home</div></a></li>
                                @if (Auth::check())
                                    <li class="menu-item"><a class="menu-link" href="{{route('dica.listar')}}"><div>Minhas Dicas</div></a></li>
                                @endif

							</ul>
						</nav>
					</div>
                    <!-- Fim Barra superior-->
				</div>
			</div>
			<div class="header-wrap-clone"></div>
		</header>

        <!-- Paginas-->
        @yield('content')

        <!-- Rodapé-->
        <footer id="footer" class="dark">
            <!-- Copyrights -->
            <div id="copyrights" style="padding-bottom: 0%; margin-bottom: 0%;" >
                <div class="container clearfix" >
                    <div class="row align-items-center justify-content-between">
                        <div class="col-md-6">
                            Copyrights © {{date('Y')}} Dicas Veículos.<br>
                            <div class="copyright-links"></div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Fim Rodapé-->

</div>

<!-- Seta suir pagina -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- JavaScripts
============================================= -->
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/plugins.min.js')}}"></script>
<script src="{{asset('js/360rotator.js')}}"></script>

<!-- Bootstrap Select Plugin -->
<script src="{{asset('js/bs-select.js')}}"></script>

<!-- Bootstrap Switch Plugin -->
<script src="{{asset('js/bs-switches.js')}}"></script>


<!-- sweetalert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Footer Scripts -->
<script src="{{asset('js/functions.js')}}"></script>

<script>



</script>

</body>
</html>


