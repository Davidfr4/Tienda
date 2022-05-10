@if(Auth::check())
<form class="w-full max-w-lg border-4 bg-white" method="POST" action="{{ route('contacta.store') }}">
    @csrf
     <h1 class="font-semibold py-5 text-blue mb-10 bg-blue-900 text-white px-5" style="background-color: orange;"> Formulario </h1>
    
    <div class="flex flex-wrap mt-3 ">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="name">
                {{ __("Nombre") }}
            </label>
            <input name="name" value="{{ Auth::user()->name }}" readonly="readonly" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" type="text">
            <p class="text-gray-600 text-xs italic -my-3">{{ __("Nombre del usuario") }}</p>
            @error("name")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                Debe rellenar este campo
            </div>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap mt-5">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="email">
                {{ __("Email") }}
            </label>
            <input name="email" value="{{ Auth::user()->email }}" readonly="readonly" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" type="text">
            <p class="text-gray-600 text-xs italic -my-3">{{ __("Email de contacto") }}</p>
            @error("email")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                Debe rellenar este campo
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap mt-5">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="mensaje">
                {{ __("Mensaje") }}
            </label>
            <textarea name="mensaje" class="no-resize appearance-none block w-full bg-gray-300 
            text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none 
            focus:bg-white focus:border-gray-500 h-48 resize-none" id="mensaje"></textarea>
            <p class="text-gray-600 text-xs italic -my-3">{{ __("Escribe tu mensaje") }}</p>
            @error("mensaje")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                Debe rellenar este campo
            </div>
            @enderror
        </div>
    </div>
    <div class="md:flex md:items-center col-12 mb-3 mx-5">
        <div class="md:w-1/3">
            <button class="shadow bg-teal-400 mt-5 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                {{ 'Enviar mensaje' }}
            </button>
        </div>
    </div>
</form>
</div>
@endif


@if(!Auth::check())

    <section class="flex flex-col break-words bg-white sm:border-1 mt-5 sm:rounded-md sm:shadow-sm sm:shadow-lg">

        <header class="font-semibold bg-gray-200 text-gray-700 px-6 sm:py-6 sm:px-8 sm:rounded-t-md" style="background-color: orange;">
            ¡Alerta!
        </header>

        <div class="w-full p-4">
            <p class="text-gray-700">
                Necesitas estar logueado para utilizar esta pestaña.
            </p>
        </div>

    </section>

@endif
