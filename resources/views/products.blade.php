@extends('layouts.frontend')
@section('content')
    <div class="d-flex justify-content-around col-10 m-auto" style="border: 1px solid red;">
        <div class="row" style="width: 100%;">
            @foreach ($productos as $product)
            <div class="d-flex justify-content-around overflow-hidden rounded-md shadow-md bg-gray-200 mt-3 col-lg-3 col-md-6 col-sm-12 mb-4 ml-auto">
                <div class="px-5 py-3">
                    <h3 class="text-gray-700 uppercase">{{ $product->name }}</h3>
                    <img src="https://m.media-amazon.com/images/I/41Dxsm-+jSL._AC_.jpg" style="width:200px;">
                    <span class="mt-4 text-gray-500 m-auto">${{ $product->price }}</span>
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="1" name="quantity">
                        <button class="px-4 py-2 text-white bg-blue-800 rounded mt-3">Añadir al carrito</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection