<?php

namespace Tests\Feature\Controllers;

use App\Models\Order;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{

    public function test_index()
    {
        $response = $this->get(route('orders.index'));
        $response->assertStatus(200);
        $response->assertViewIs('orders.index');
        $response->assertViewHas('orders');
    }

    public function test_show()
    {
        $order = Order::factory()->create();
        $response = $this->get(route('orders.show', $order));
        $response->assertStatus(200);
        $response->assertViewIs('orders.show');
        $response->assertViewHas('order');
    }
}
