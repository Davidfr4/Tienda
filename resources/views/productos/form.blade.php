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

    <!-- NOMBRE -->
    <div class="flex flex-wrap -mx-3 mb-1">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3" for="name">
                {{ __("Nombre") }}
            </label>
            <input name="name" value="{{ old('name') ?? $producto->name }}" placeholder="Nombre del producto" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" type="text" required>
            @error("Nombre")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                Debe rellenar este campo
            </div>
            @enderror
        </div>
    </div>
    <!-- FIN NOMBRE -->

    <!-- PRECIO -->
    <div class="flex flex-wrap -mx-3 mb-1">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3 mt-3" for="precio">
                {{ __("Precio") }}
            </label>
            <input name="precio" value="{{ old('precio') ?? $producto->precio }}" placeholder="Precio del producto" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="precio" type="number" min="0" required>
            @error("Precio")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                Debe rellenar este campo
            </div>
            @enderror
        </div>
    </div>
    <!-- FIN PRECIO -->

    <!-- STOCK -->
    <div class="flex flex-wrap -mx-3 mb-1">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3 mt-3" for="cantidad">
                {{ __("Stock") }}
            </label>
            <input name="stock" value="{{ old('stock') ?? $producto->stock }}" placeholder="Stock del producto" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="stock" type="number" required>
            @error("Stock")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                Debe rellenar este campo
            </div>
            @enderror
        </div>
    </div>
    <!-- FIN STOCK -->

    <!-- DESCRIPCIÓN -->
    <div class="flex flex-wrap -mx-3 mb-1">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3 mt-3" for="descripcion">
                {{ __("Descripcion") }}
            </label>
            <input name="descripcion" value="{{ old('descripcion') ?? $producto->descripcion }}" placeholder="Describe el producto" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="descripcion" type="text" required>
            @error("Descripcion")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                Debe rellenar este campo
            </div>
            @enderror
        </div>
    </div>
    <!-- FIN DESCRIPCIÓN -->

    <!-- FABRICANTE -->
    <div class="flex flex-wrap -mx-3 mb-1">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3 mt-3" for="fabricante">
                {{ __("Fabricante") }}
            </label>
            <input name="fabricante" value="{{ old('fabricante') ?? $producto->fabricante }}" placeholder="Fabricante del producto" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="fabricante" type="text" required>
            @error("Fabricante")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                Debe rellenar este campo
            </div>
            @enderror
        </div>
    </div>
    <!-- FIN FABRICANTE -->

    <!-- CATEGORÍA -->
    <div class="flex flex-wrap -mx-3 mb-1">
        <div class="w-full px-5">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold -my-1 mb-3 mt-3" for="categoria">
                {{ __("Categoria") }}
            </label>
            
            <select name="id_categoria" id="categoria" class="appearance-none block w-full bg-gray-300 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                <option value="{{  old('id_categoria') ?? $producto->id_categoria=1 }}">Componentes de ordenador</option>
                <option value="{{  old('id_categoria') ?? $producto->id_categoria=2 }}">Electrónica</option>
                <option value="{{  old('id_categoria') ?? $producto->id_categoria=3 }}">Electrodomésticos</option>
            </select>
            <p class="text-gray-600 text-xs italic -my-3">{{ __("Categoría del producto") }}</p>

            @error("Categoria")
            <div class="border border-red-400 rounded-b bg-red-100 mt-1 px-4 py-3 text-red-700">
                Debe rellenar este campo
            </div>
            @enderror
        </div>
    </div>
    <!-- FIN CATEGORÍA -->

    <div class="md:flex md:items-center mt-3 mb-3 mx-5">
        <div class="md:w-1/3">
            <button class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded mt-3" type="submit">
                {{ $textButton }}
            </button>
        </div>
    </div>
</form>