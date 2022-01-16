@extends('layout')

@section('main')

    @if ($product)
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-around p-4">
            <img src="{{url('/')}}/images/{{$product->image}}" alt="" class="w-full lg:w-1/2 h-96 object-cover object-center rounded">
            <div class="w-full lg:w-1/2 p-5 flex flex-col">
                <div class="text-2xl pb-4 flex justify-between">
                    <div>{{$product->name}}</div>
                    <div class="font-bold">{{ \App\Libs\Common::withVAT($product->price,$product->vat) }} €</div>
                </div>
                <p class="text-justify flex-grow">{{$product->description}}</p>
                <a class="bg-blue-700 text-white px-4 py-1 mt-4 inline-block w-full text-center rounded-sm text-lg" href="{{url('/')}}/add-to-cart/{{$product->id}}">Ajouter au panier</a>
            </div>
        </div>
    </div>
    @else
    <h1 class="text-center text-3xl p-10">
        Ce produit n'existe pas
    </h1>
    @endif

@endsection
