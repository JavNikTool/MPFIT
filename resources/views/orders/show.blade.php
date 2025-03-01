@php use App\Enums\Order\Status; @endphp
@extends('welcome')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Заказ #{{ $order->id }}</h1>
    <div class="mb-4">
        <label for="product" class="block text-gray-700 text-sm font-bold mb-2">Товар:</label>
        <p id="product" class="text-gray-700 text-sm">{{ $order->product->title }}</p>
    </div>
    <div class="mb-4">
        <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Количество:</label>
        <p id="quantity" class="text-gray-700 text-sm">{{ $order->quantity }}</p>
    </div>
    <div class="mb-4">
        <label for="total_price" class="block text-gray-700 text-sm font-bold mb-2">Общая стоимость:</label>
        <p id="total_price" class="text-gray-700 text-sm">{{ $order->getTotalPrice() }} руб.</p>
    </div>
    <div class="mb-4">
        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Статус:</label>
        <p id="status" class="text-gray-700 text-sm">{{ $order->status }}</p>
    </div>
    @if ($order->status !==  Status::CANCELLED->value)
        <form action="{{ route('orders.update', [$order]) }}" method="post">
            @csrf
            @method('PUT')
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Выполнить заказ
            </button>
        </form>
    @endif
@endsection
