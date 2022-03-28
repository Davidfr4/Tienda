@extends('admin.index')

@section("content")

    <h1 class="text-center text-success">{{ __("Listado de usuarios") }}</h1>
        <!--<a href="{{ route("productos.create") }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            {{ __("Crear proyecto") }}
        </a>-->
    


<table class="table table-danger table-striped" style="width: 100%">
    <thead>
    <tr>
        <th scope="col">{{ ("ID") }}</th>
        <th scope="col">{{ ("Nombre") }}</th>
        <th scope="col">{{ ("Email") }} </th>
        <th scope="col">{{ ("Rol") }} </th>
    </tr>
    </thead>
    <tbody>
        @forelse($users as $user)
            <tr>
                
                <td>{{ $user->id }}</td>

                <td>{{ $user->name }}</td>

                <td>{{ $user->email }}</td>

                <td>
                    {{implode(' , ',$user->roles->map(function($role){
                                return $role->name;
                            })->toArray()
                        )
                    }}
                </td>

            </tr>
        @empty
            <tr>
                <td colspan="4">
                    <div class="bg-red-100 text-center border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <p><strong class="font-bold">{{ __("No hay usuarios") }}</strong></p>
                        <span class="block sm:inline">{{ __("Todavía no hay nada que mostrar aquí") }}</span>
                    </div>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">

</div>
@endsection