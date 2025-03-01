@extends('welcome')

@section('content')
    <h1 class="text-3xl font-bold mb-4">{{ $product->title }}</h1>
    <div class="mb-4">
        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Описание:</label>
        <p id="description" class="text-gray-700 text-sm">{{ $product->description }}</p>
    </div>
    <div class="mb-4">
        <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Цена:</label>
        <p id="price" class="text-gray-700 text-sm">{{ $product->price }} руб.</p>
    </div>
    <div class="mb-4">
        <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Количество:</label>
        <p id="quantity" class="text-gray-700 text-sm">{{ $product->quantity }} шт.</p>
    </div>
    <div class="mb-4">
        <a href="{{ route('products.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Назад к списку товаров
        </a>
    </div>
@endsection
