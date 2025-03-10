@php use App\Models\ProductCategory; @endphp
@extends('welcome')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Товары</h1>
    <a href="{{ route('products.create') }}" class="text-gray-600 hover:text-gray-900 transition duration-300 cursor-pointer mb-4">
        Добавить товар
    </a>
    <table class="table-auto w-full mb-14">
        <thead>
        <tr>
            <th class="px-4 py-2">Название</th>
            <th class="px-4 py-2">Описание</th>
            <th class="px-4 py-2">Цена</th>
            <th class="px-4 py-2">Количество</th>
            <th class="px-4 py-2">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
                <tr>
                    <td class="px-4 py-2">{{ $product->title }}</td>
                    <td class="px-4 py-2">{{ $product->description }}</td>
                    <td class="px-4 py-2">{{ $product->price }}</td>
                    <td class="px-4 py-2">{{ $product->quantity }}</td>
                    <td class="px-4 py-2">
                        <form action="{{ route('products.show', [$product]) }}" method="get">
                            <button type="submit" class="text-gray-600 hover:text-gray-900 transition duration-300 cursor-pointer">
                                Просмотр
                            </button>
                        </form>
                        <form action="{{ route('products.edit', [$product]) }}" method="get">
                            <button type="submit" class="text-gray-600 hover:text-gray-900 transition duration-300 cursor-pointer">
                                Редактировать
                            </button>
                        </form>
                        <form action="{{ route('products.destroy', [$product]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-gray-900 transition duration-300 cursor-pointer">
                                Удалить
                            </button>
                        </form>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    {{ $products->links() }}
@endsection
