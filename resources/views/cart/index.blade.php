@extends('layout')

@section('main')

    <div class="container mx-auto">
        <h1 class="my-5 text-3xl">Votre panier</h1>
        <table class="w-full mb-5 text-lg border-separate">
            <tr class="text-white bg-gray-400">
                <th class="p-2">Illustration</th>
                <th class="p-2">Produit</th>
                <th class="p-2">Quantité</th>
                <th class="p-2">PU HT</th>
                <th class="p-2">Total HT</th>
            </tr>
        @foreach(Session::get('cart', []) as $product)
                <tr class="bg-gray-100 border-b">
                    <td><img src="{{url('/')}}/images/{{ $product->image }}" alt="" class="object-cover w-20 h-10"></td>
                    <td>{{ $product->name }}</td>
                    <td class="text-right">{{ $product->quantity }}</td>
                    <td class="text-right">{{ $product->price }} €</td>
                    <td class="text-right">{{ $product->price*$product->quantity }} €</td>
                </tr>
        @endforeach
            <tr class="border-b">
                <td class="py-2" colspan="4">Total HT</td>
                <td class="py-2 text-right">{{$total}} €</td>
            </tr>
            <tr class="border-b">
                <td class="py-2" colspan="4">TVA</td>
                <td class="py-2 text-right">{{$vat}} €</td>
            </tr>
            <tr class="border-b">
                <td class="py-2 font-bold " colspan="4">Total TTC</td>
                <td class="py-2 font-bold text-right">{{$total+$vat}} €</td>
            </tr>
        </table>

    </div>

@endsection
