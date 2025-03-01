<?php

namespace App\Repositories;

use App\Contracts\Base\BaseRepository;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository implements BaseRepository
{
    public function getBaseQuery(): Builder
    {
        return Product::query();
    }

    public function paginate($query, $perPage): LengthAwarePaginator
    {
        return $query->paginate($perPage);
    }
}
