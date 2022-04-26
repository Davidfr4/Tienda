<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body class="bg-red-100 h-screen antialiased leading-none font-sans" style="background-image: url(https://www.citipa.org/wp-content/uploads/2020/11/keyboard-616492_duotono_recortada-1600x900.jpg); background-repeat: no-repeat; background-size: cover;">
<div class="flex flex-col">
    @if(Route::has('login'))
        <header style="width:100%; backgroudnd-color: black;">

            <div class="absolute top-0 right-0 mt-4 space-x-4 sm:mt-6 sm:mr-6 sm:space-x-6">
                @auth
                    <a href="{{ url('/home') }}" class="btn btn-success no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Home') }}</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-success no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Acceder') }}</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-success no-underline hover:underline text-sm font-normal text-teal-800 uppercase">{{ __('Regístrate') }}</a>
                    @endif
                @endauth
            </div>

        </header>
    @endif

    <div class="min-h-screen flex items-center justify-center mt-5">
        <div class="flex flex-col justify-around h-full" style="width:60%;">
            <div class="px-5" style="height:800px; width:100%; background-color: rgb(225,225,225);">
                <h1 class="mb-6 mt-3 text-dark text-center font-light tracking-wider text-4xl sm:mb-8 sm:text-6xl" style="font-weight: bold;">
                    {{ config('app.name', 'Laravel') }}
                </h1>
                
                <div class="text-center mt-5">

                    <h3>¡Bienvenidos a nuestra tienda online!</h3>

                    <img src="https://blogs.unsw.edu.au/nowideas/files/2018/10/tecnologia.jpg" class="m-auto mt-5">

    
                    <h5 class="mt-5">¡Loguearos, o registraros si no lo estáis, para disfrutar de todo el contenido de nuestra tienda! </h5>

                </div>
				
			</div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
