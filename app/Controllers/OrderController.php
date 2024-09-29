<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Division;
use App\Models\Order;
use App\Models\OrderSegment;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::query()->orderBy('id', 'DESC')->all();
        return view('dashboard/orders/index.view', [
            'orders' => $orders
        ]);
    }

    public function create()
    {

        $orderSegments = OrderSegment::query()->all(["DISTINCT (type)"]);
        return view('dashboard/orders/create.view', [
            'orders' => [],
            'types' => $orderSegments,
            'divisions' => Division::query()->all()
        ]);
    }
}