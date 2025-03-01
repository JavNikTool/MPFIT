@extends('welcome')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Заказы</h1>
    <table class="table-auto w-full">
        <thead>
        <tr>
            <th class="px-4 py-2">Номер заказа</th>
            <th class="px-4 py-2">Дата заказа</th>
            <th class="px-4 py-2">Сумма</th>
            <th class="px-4 py-2">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td class="px-4 py-2">{{ $order->name }}</td>
                <td class="px-4 py-2">{{ $order->description }}</td>
                <td class="px-4 py-2">{{ $order->price }}</td>
                <td class="px-4 py-2">
                    <a href="#" class="text-gray-600 hover:text-gray-900 transition duration-300">Редактировать</a>
                    <a href="#" class="text-gray-600 hover:text-gray-900 transition duration-300">Удалить</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
