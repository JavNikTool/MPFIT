<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct(public ProductService $productService){}

    public function index(): View
    {
        $products = $this->productService->getAllProductsWithPaginate(10);

        return view('products.index', ['products' => $products]);
    }

    public function create(): View
    {
        return view('products.create', ['productCategories' => ProductCategory::all()]);
    }

    public function store(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $product = Product::create($data);

        if(!$product->wasRecentlyCreated) {
            return redirect()
                ->route('products.index')
                ->with('error', 'Ошибка при добавлении товара. Попробуйте еще раз.');
        }
        return redirect()
            ->route('products.index')
            ->with('success', 'Товар успешно добавлен.');
    }

    public function edit(Product $product): View
    {
        return view('products.edit', [
            'product' => $product,
            'productCategories' => ProductCategory::all(),
        ]);
    }

    public function update(UpdateRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();

        $product->update($data);

        return redirect()
            ->route('products.index')
            ->with('success', 'Товар успешно обновлен.');
    }

    public function show(Product $product): View
    {
        return view('products.show', ['product' => $product]);
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
