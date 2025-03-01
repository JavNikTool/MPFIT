@extends('welcome')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Добавить заказ</h1>
    <form action="{{ route('orders.store') }}" method="post">
        @csrf
        <div class="mb-4">
            <label for="client_id" class="block text-gray-700 text-sm font-bold mb-2">Клиент:</label>
            <select id="client_id" name="client_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->full_name }}</option>
                @endforeach
            </select>
            @error('client_id')
            <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="product_id" class="block text-gray-700 text-sm font-bold mb-2">Товар:</label>
            <select id="product_id" name="product_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                @endforeach
            </select>
            @error('product_id')
            <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Количество:</label>
            <input type="number" id="quantity" name="quantity" value="1" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('quantity')
            <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="comment" class="block text-gray-700 text-sm font-bold mb-2">Комментарий:</label>
            <textarea id="comment" name="comment" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            @error('comment')
            <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Добавить заказ
        </button>
    </form>
@endsection
