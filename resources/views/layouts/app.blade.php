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
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="py-6" style="background-color: orange;">

            <!-- MENÚ -->
            <div class="container mx-auto flex justify-between items-center px-6">

                <div>
                    <a href="{{ url('/') }}" class="btn menuGeneral text-white text-lg text-gray-100 no-underline px-5">
                        {{ ("Inicio") }}
                    </a>

                    @auth

                    <button class="btn dropdown-toggle menuGeneral menu text-white font-weight-bold px-5" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Productos
                        </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="background-color: #FF7A33;">

                                <li><a href="{{ route('productos.index') }}" class="text-lg font-semibold no-underline px-3 text-white">{{ __("Todos los productos") }}</a></li>
                                <li><a href="{{ route('productos.indexComponentes') }}" class="text-lg font-semibold no-underline px-3 text-white">{{ __("Componentes de ordenador") }}</a></li>
                                <li><a href="{{ route('productos.indexElectronica') }}" class="text-lg font-semibold no-underline px-3 text-white">{{ __("Productos de electrónica") }}</a></li>
                                <li><a href="{{ route('productos.indexElectrodomesticos') }}" class="text-lg font-semibold no-underline px-3 text-white">{{ __("Electrodomésticos") }}</a></li>

                            </ul>
                        </button>


                        <a href="{{ route('contacta.index') }}" class="btn menuGeneral text-white text-lg text-gray-100 no-underline px-5">
                            {{ __("Contacto") }}

                        @if(Auth::check() and Auth::user()->hasRoles('admin'))
                            <a href="{{ route('admin.index') }}" class="btn menuGeneral text-white text-lg text-gray-100 no-underline px-5">
                                {{ __("Panel administrador") }}
                        @endif

                        <a href="{{ route('cart.list') }}" class="btn menuGeneral text-white text-lg text-gray-100 no-underline px-5">
                            <div class="flex">
                                <svg class="w-5 h-5 mt-1" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>

                                <div>{{ Cart::getTotalQuantity()}}</div>
                            </div>
                            
                        </a>

                    @endauth

                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    @guest
                        <a class="no-underline hover:underline text-white btn btn-primary" href="{{ route('login') }}">{{ __('Acceder') }}</a>
                        @if (Route::has('register'))
                            <a class="no-underline hover:underline btn btn-primary" href="{{ route('register') }}">{{ __('Regístrate') }}</a>
                        @endif
                    @else
                        <span class="text-white">{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}"
                           class="btn btn-danger text-white no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Desconectarse') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
            <!-- FIN MENÚ -->
        </header>
        @if(session("success"))
        <div class="container mx-auto mt-5">
            <div class="bg-red-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                <div class="flex">
                    <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                        <p class="font-bold">{{ __("Alerta") }}</p>
                        <p class="text-sm">{{ session("success") }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
