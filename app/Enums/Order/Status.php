<?php

namespace App\Enums\Order;

enum Status: string
{
    case NEW = 'новый';
    case CANCELLED = 'выполнен';
}
