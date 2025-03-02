<?php

namespace App\Contracts\Base;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

interface BaseRepository
{
    public function getBaseQuery(): Builder;

    public function paginate(Builder $query, int $perPage): LengthAwarePaginator;
}
