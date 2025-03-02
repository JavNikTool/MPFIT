<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use App\Services\Base\BaseService;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderService extends BaseService
{
    public function __construct(private readonly OrderRepository $orderRepository)
    {
        $this->repository = $this->orderRepository;
    }

    public function getAllOrdersWithPaginate(int $perPage): LengthAwarePaginator
    {
        $query = $this->repository->getBaseQuery();
        $query = $query->orderByDesc('id');
        return $this->repository->paginate($query, $perPage);
    }
}
