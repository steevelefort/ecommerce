@extends('layout')

@section('main')

    @if ($product)
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-around p-4">
            <img src="{{url('/')}}/images/{{$product->image}}" alt="" class="object-cover object-center w-full rounded lg:w-1/2 h-96">
            <div class="flex flex-col w-full p-5 lg:w-1/2">
                <div class="flex justify-between pb-4 text-2xl">
                    <div>{{$product->name}}</div>
                    <div class="font-bold">{{ \App\Libs\Common::withVAT($product->price,$product->vat) }} €</div>
                </div>
                <p class="flex-grow text-justify">{{$product->description}}</p>
                <a class="inline-block w-full px-4 py-1 mt-4 text-lg text-center text-white bg-blue-700 rounded-sm" href="{{url('/')}}/add-to-cart/{{$product->id}}">Ajouter au panier</a>
            </div>
        </div>
    </div>
    @else
    <h1 class="p-10 text-3xl text-center">
        Ce produit n'existe pas
    </h1>
    @endif

@endsection
