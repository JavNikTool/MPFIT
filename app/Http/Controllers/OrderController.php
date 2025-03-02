<?php

namespace App\Http\Controllers;

use App\Enums\Order\Status;
use App\Http\Requests\Order\StoreRequest;
use App\Models\Client;
use App\Models\Order;
use App\Models\Product;
use App\Services\OrderService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{

    public function __construct(public OrderService $orderService){}

    public function index(): View
    {
        $orders = $this->orderService->getAllOrdersWithPaginate(8);
        return view('orders.index', ['orders' => $orders]);
    }

    public function show(Order $order): View
    {
        return view('orders.show', ['order' => $order]);
    }

    public function update(Request $request, Order $order): RedirectResponse
    {
        $order->update([
            'status' => Status::CANCELLED->value
        ]);

        return redirect()->route('orders.index')->with('success', 'Заказ выполнен!');
    }

    public function create(): View
    {
        $clients = Client::all();
        $products = Product::all();
        return view('orders.create', ['clients' => $clients, 'products' => $products]);
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $order = Order::create($data);

        if(!$order->wasRecentlyCreated) {
            return redirect()->route('orders.index')->with('error', 'Ошибка при создании заказа.');
        }
        return redirect()->route('orders.index')->with('success', 'Заказ добавлен успешно!');
    }
}
