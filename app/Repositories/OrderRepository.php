<?php

namespace App\Repositories;

use App\Contracts\Base\BaseRepository;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderRepository implements BaseRepository
{
    public function getBaseQuery(): Builder
    {
        return Order::query();
    }

    public function paginate($query, $perPage): LengthAwarePaginator
    {
        return $query->paginate($perPage);
    }
}
