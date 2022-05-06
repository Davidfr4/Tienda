@extends('admin.index')

@section("content")
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <h1 class="text-center text-success">{{ __("Listado de categorias") }}</h1>
        <!--<a href="{{ route("productos.create") }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            {{ __("Crear proyecto") }}
        </a>-->
    
    <div class="flex justify-center flex-wrap bg-gray-200 p-4 mt-3">
        <div class="text-center">   

            <a href="{{ route('categorias.create') }}" class="btn btn-primary hover:bg-success text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500  rounded">
                {{ __("Crear categoria") }}
            </a>
        </div>
    </div>

<table class="table table-success table-striped" style="width: 100%">
    <thead>
    <tr>
        <th scope="col" class="text-center">{{ ("ID") }}</th>
        <th scope="col" class="text-center">{{ ("Nombre") }}</th>
        <th scope="col" class="text-center">{{ ("Fecha de creación") }}</th>
        <th scope="col" class="text-center">{{ ("Acciones") }}</th>

    </tr>
    </thead>
    <tbody>
    @forelse($categorias as $categoria)
            <tr>
                <td class="text-center">{{ $categoria->id }}</td>
                <td class="text-center">{{ $categoria->name }}</td>
                <td class="text-center">{{ date_format($categoria->created_at, "d/m/Y") }}</td>
                <td class="border px-4 py-2 text-center">
                        <a href="{{ route('categorias.edit', ['categoria' => $categoria]) }}" class="text-white btn btn-primary" style="margin-right: 20px;">{{ __("Editar") }}</a> 
                        <a
                            href="#"
                            class="text-white btn btn-danger"
                            onclick="event.preventDefault();
                                document.getElementById('delete-project-{{ $categoria->id }}-form').submit();"
                        >{{ __("Eliminar") }}
                        </a>
                        <form id="delete-project-{{ $categoria->id }}-form" action="{{ route('categorias.destroy', ['categoria' => $categoria]) }}" method="POST" class="hidden">
                            @method("DELETE")
                            @csrf
                        </form>
                    </td>
                
            </tr>
        @empty
            <tr class="text-center">
                <td colspan="12">
                    <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <p><strong class="font-bold text-dark">{{ __("No hay categorias") }}</strong></p>
                        <span class="block sm:inline text-dark"><strong>{{ __("Todavía no hay nada que mostrar aquí") }}</strong></span>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

    @if($categorias->count())    
        <div class="mt-3">
            {{ $categorias->links() }}
           
        </div>
    @endif

    @if($categorias->count() < 1)
        
        <script>
            window.location.replace("/admin/list_categorias");
        </script>

    @endif  

</div>
@endsection

