@extends('welcome')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Заказы</h1>
    <a href="{{ route('orders.create') }}" class="text-gray-600 hover:text-gray-900 transition duration-300 cursor-pointer mb-4">
        Создать заказ
    </a>
    <table class="table-auto w-full mb-14">
        <thead>
        <tr>
            <th class="px-4 py-2">Номер заказа</th>
            <th class="px-4 py-2">Дата создания</th>
            <th class="px-4 py-2">ФИО покупателя</th>
            <th class="px-4 py-2">Статуса заказа</th>
            <th class="px-4 py-2">Итоговая цены</th>
            <th class="px-4 py-2">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td class="px-4 py-2">{{ $order->id }}</td>
                <td class="px-4 py-2">{{ $order->created_at->format('Y.m.d H:i:s') }}</td>
                <td class="px-4 py-2">{{ $order->client?->full_name }}</td>
                <td class="px-4 py-2">{{ $order->status }}</td>
                <td class="px-4 py-2">{{ $order->getTotalPrice() }}</td>
                <td class="px-4 py-2">
                    <form action="{{ route('orders.show', [$order]) }}" method="get">
                        <button type="submit" class="text-gray-600 hover:text-gray-900 transition duration-300 cursor-pointer">
                            Просмотр
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $orders->links() }}
@endsection
