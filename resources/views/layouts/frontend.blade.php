<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />
</head>
<body>
    <div  class="bg-white">
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
        
        <main  style="background-image: url('https://www.citipa.org/wp-content/uploads/2020/11/keyboard-616492_duotono_recortada-1600x900.jpg');
                     background-repeat: no-repeat; 
                     background-size: cover;">
            @yield('content')
        </main>
    
    </div>
</body>
</html>