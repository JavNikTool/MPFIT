<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Services\Base\BaseService;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService extends BaseService
{
    public function __construct(private ProductRepository $productRepository)
    {
        $this->repository = $productRepository;
    }

    public function getAllProductsWithPaginate(int $perPage): LengthAwarePaginator
    {
        $query = $this->repository->getBaseQuery();
        $query = $query->orderByDesc('id');
        return $this->repository->paginate($query, $perPage);
    }
}
