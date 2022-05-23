@extends('admin.index')

@section("content")
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <h1 class="text-center text-success">{{ __("Listado de categorias") }}</h1>

<table class="table table-success table-striped mt-5" style="width: 100%">
    <thead>
    <tr>
        <th scope="col" class="text-center">{{ ("ID") }}</th>
        <th scope="col" class="text-center">{{ ("Nombre") }}</th>
        <th scope="col" class="text-center">{{ ("Fecha de creación") }}</th>

    </tr>
    </thead>
    <tbody>
    @forelse($categorias as $categoria)
            <tr>
                <td class="text-center">{{ $categoria->id }}</td>
                <td class="text-center">{{ $categoria->name }}</td>
                <td class="text-center">{{ date_format($categoria->created_at, "d/m/Y") }}</td>
                
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

</div>
@endsection

