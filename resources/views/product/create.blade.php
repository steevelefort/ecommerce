@extends('layout')

@section('main')
    <main class="container mx-auto">
        <h1 class="mb-3 text-2xl font-bold">Créer un nouveau produit</h1>

        <form class="flex flex-wrap" action="{{ url('/product/create') }}" method="POST"  enctype="multipart/form-data">

            @csrf

            <div class="flex flex-col w-full p-1">
                <label for="" class="text-xs">Nom du produit <span class="text-red">*</span></label>
                <input type="text" name="name" value="{{ old("name","") }}"
                       class="p-2 border border-gray-300 rounded" placeholder="Nom du produit">
                @error('name')<div class="text-red-600">{{$message}}</div>@enderror
            </div>
            <div class="flex flex-col w-full p-1">
                <label for="" class="text-xs">Description <span class="text-red">*</span></label>
                <textarea type="text" name="description"
                          class="p-2 border border-gray-300 rounded" placeholder="Description">{{ old("description","") }}</textarea>
                @error('description')<div class="text-red-600">{{$message}}</div>@enderror
            </div>
            <div class="flex flex-col w-full p-1">
                <label for="" class="text-xs">Photo <span class="text-red">*</span></label>
                <input type="file" name="image"
                       class="p-2 border border-gray-300 rounded" placeholder="Illustration du produit">
                @error('image')<div class="text-red-600">{{$message}}</div>@enderror
            </div>
            <div class="flex flex-col w-1/2 p-1">
                <label for="" class="text-xs">Prix <span class="text-red">*</span></label>
                <input type="number" name="price" step="0.01" value="{{ old("price","") }}"
                       class="p-2 border border-gray-300 rounded" placeholder="Prix">
                @error('price')<div class="text-red-600">{{$message}}</div>@enderror
            </div>
            <div class="flex flex-col w-1/2 p-1">
                <label for="" class="text-xs">Taux de TVA <span class="text-red">*</span></label>
                <select type="number" name="vat" step="0.01" value="{{ old("vat","") }}"
                        class="p-2 border border-gray-300 rounded" placeholder="TVA">
                    <option value="20" selected>20</option>
                    <option value="2.1">2.1</option>
                    <option value="5.5">5.5</option>
                    <option value="10">10</option>
                </select>
                @error('vat')<div class="text-red-600">{{$message}}</div>@enderror
            </div>

            <div class="mt-5">
                <button class="px-4 py-2 text-center text-white bg-blue-800" type="submit">Créer ce produit</button>
            </div>

        </form>
    </main>
@endsection
