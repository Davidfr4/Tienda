<!--<div class="w-full max-w-lg">
    <div class="flex flex-wrap ">
        <h1 class="mb-5 px-300">{{ $title }}</h1>
    </div>
</div>-->

<form class="w-full max-w-lg border-4 bg-white" method="POST" action="{{ $route }}">
    @csrf
    @isset($update)
        @method("PUT")
    @endisset
    <h1 class="font-semibold py-5 text-blue mb-10 text-white px-5" style="background-color: orange;">{{ $title }} </h1>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="name">
                {{ __("Nombre") }}
            </label>
            <input name="name" value="{{ old('name') ?? $producto->name }}" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" type="text" required>
            <p class="text-gray-600 text-xs italic -my-3">{{ __("Nombre del producto") }}</p>
            @error("Nombre")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                Debe rellenar este campo
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3 mt-3" for="precio">
                {{ __("Precio") }}
            </label>
            <input name="precio" value="{{ old('precio') ?? $producto->precio }}" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="precio" type="text" required>
            <p class="text-gray-600 text-xs italic -my-3">{{ __("Precio del producto") }}</p>
            @error("Precio")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                Debe rellenar este campo
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3 mt-3" for="cantidad">
                {{ __("Stock") }}
            </label>
            <input name="stock" value="{{ old('stock') ?? $producto->stock }}" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="stock" type="text" required>
            <p class="text-gray-600 text-xs italic -my-3">{{ __("Stock del producto") }}</p>
            @error("Stock")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                Debe rellenar este campo
            </div>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3 mt-3" for="fabricante">
                {{ __("Fabricante") }}
            </label>
            <input name="fabricante" value="{{ old('fabricante') ?? $producto->fabricante }}" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="fabricante" type="text" required                                  >
            <p class="text-gray-600 text-xs italic -my-3">{{ __("Fabricante del producto") }}</p>
            @error("Fabricante")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                Debe rellenar este campo
            </div>
            @enderror
        </div>
    </div>

    <div class="md:flex md:items-center">
        <div class="md:w-1/3">
            <button class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mt-3" type="submit">
                {{ $textButton }}
            </button>
        </div>
    </div>
</form>