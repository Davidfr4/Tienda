<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />

</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans altura">
    <div id="app" class="pb-3 altura">
    <header class="py-6" style="background-color: orange;">

        <!-- MENÚ -->
        <div class="container mx-auto flex justify-between items-center px-6">

            <div class="d-flex d-lg-none">
            
                <button class="btn font-semibold menu" type="button" id="menu" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </button>
                <ul class="dropdown-menu" aria-labelledby="menu" style="background-color: #FF7A33;">
                    <li><a href="/" class="btn menuGeneral text-white text-lg text-gray-100 no-underline px-5">Inicio</a></li>
                    <li><a href="{{ route('productos.index') }}" class="btn menuGeneral text-white text-lg text-gray-100 no-underline px-5">{{ __("Todos los productos") }}</a></li>
                    <li><a href="{{ route('productos.indexComponentes') }}" class="btn menuGeneral text-white text-lg text-gray-100 no-underline px-5">{{ __("Componentes de ordenador") }}</a></li>
                    <li><a href="{{ route('productos.indexElectronica') }}" class="btn menuGeneral text-white text-lg text-gray-100 no-underline px-5">{{ __("Productos de electrónica") }}</a></li>
                    <li><a href="{{ route('productos.indexElectrodomesticos') }}" class="btn menuGeneral text-white text-lg text-gray-100 no-underline px-5">{{ __("Electrodomésticos") }}</a></li>

                    @auth
                    <li><a href="{{ route('contacta.index') }}" class="btn menuGeneral text-white text-lg text-gray-100 no-underline px-5">{{ __("Contacto") }}</a></li>
                        

                    @if(Auth::check() and Auth::user()->hasRoles('admin'))
                    <li><a href="{{ route('admin.index') }}" class="btn menuGeneral text-white text-lg text-gray-100 no-underline px-5">{{ __("Panel administrador") }}</a></li>
                    @endif
                    
                    @if(Auth::check() and Auth::user()->hasRoles('cliente'))
                    <a href="{{ route('productos.indexPedidos') }}" class="btn menuGeneral text-white text-lg text-gray-100 no-underline px-5">{{ __("Pedidos") }}</a>
                    @endif

                    @endauth
                </ul>
            </div>

            <div class="d-none d-lg-block">
                <a href="{{ url('/') }}" class="btn menuGeneral text-white text-lg text-gray-100 no-underline px-5">
                            {{ ("Inicio") }}
                </a>


                <button class="btn dropdown-toggle menuGeneral menu text-white font-weight-bold px-5" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Productos
                </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="background-color: #FF7A33;">

                        <li><a href="{{ route('productos.index') }}" class="text-lg font-semibold no-underline px-3 text-white">{{ __("Todos los productos") }}</a></li>
                        <li><a href="{{ route('productos.indexComponentes') }}" class="text-lg font-semibold no-underline px-3 text-white">{{ __("Componentes de ordenador") }}</a></li>
                        <li><a href="{{ route('productos.indexElectronica') }}" class="text-lg font-semibold no-underline px-3 text-white">{{ __("Productos de electrónica") }}</a></li>
                        <li><a href="{{ route('productos.indexElectrodomesticos') }}" class="text-lg font-semibold no-underline px-3 text-white">{{ __("Electrodomésticos") }}</a></li>

                    </ul>

                @auth
                    <a href="{{ route('contacta.index') }}" class="btn menuGeneral text-white text-lg text-gray-100 no-underline px-5">
                        {{ __("Contacto") }}
                    </a>

                    @if(Auth::check() and Auth::user()->hasRoles('admin'))
                        <a href="{{ route('admin.index') }}" class="btn menuGeneral text-white text-lg text-gray-100 no-underline px-5">
                            {{ __("Panel administrador") }}
                        </a>
                    @endif

                    @if(Auth::check() and Auth::user()->hasRoles('cliente'))
                        <a href="" class="btn menuGeneral text-white text-lg text-gray-100 no-underline px-5">{{ __("Pedidos") }}</a>
                    @endif

                @endauth

            </div>

            <!-- LOGIN, REGISTER Y LOGOUT -->
            <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                @guest
                    <a class="no-underline hover:underline text-white btn btn-primary" href="{{ route('login') }}">{{ __('Acceder') }}</a>
                    @if (Route::has('register'))
                        <a class="no-underline hover:underline btn btn-primary" href="{{ route('register') }}">{{ __('Regístrate') }}</a>
                    @endif
                @else
                    <a href="{{ route('cart.list') }}" class="btn menuGeneral text-white text-lg text-gray-100 no-underline">
                        <div class="flex">
                            <svg class="w-5 h-5 mt-1" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                            <div>{{ Cart::getTotalQuantity()}}</div>
                        </div> 
                    </a>

                    <span class="text-white">{{ Auth::user()->name }}</span>

                    <a href="{{ route('logout') }}"
                    class="btn btn-danger text-white no-underline hover:underline"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                                                                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                                                                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                                                             </svg></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                @endguest
            </nav>
        </div>
        <!-- FIN MENÚ -->
    </header>
        @if(session("success"))
            <script>

                alert("{{ session('success') }}")

            </script>
        @endif

        @yield('content')
    </div>

    <!-- FOOTER -->
    <footer class="pt-3 pb-1 text-white" style="background-color: orange;">

        <div class="row col-12 justify-content-center">

            <a href="https://twitter.com/?lang=es" class="col-1" style="width:75px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                </svg>
            </a>

            <a href="https://es-es.facebook.com/" class="col-1 mx-3" style="width:75px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                </svg>
            </a>

            <a href="https://www.instagram.com/" class="col-1" style="width:75px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                </svg>
            </a>

        </div>

        <div class="col-12 mt-4 m-auto justify-content-center">

            <p class="mt-3 text-center mr-5" style="font-size: 22px;">Tecnologías-Naranco ©</p>

        </div>
        
    </footer>
    <!-- FIN FOOTER -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
