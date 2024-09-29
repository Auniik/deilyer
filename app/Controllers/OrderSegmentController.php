<?php

namespace App\Controllers;

use App\Models\OrderSegment;
use Core\Request;
use Core\Response;

class OrderSegmentController extends Controller
{
    public function index()
    {
        return view('dashboard/order-segment/create.view', [
            'orderSegments' => OrderSegment::query()->all(),
        ]);
    }

    public function store(Request $request)
    {
        $segment = $request->all();
        OrderSegment::query()->create([
            'destination_type' => $segment['destination_type'],
            'type' => $segment['type'],
            'min_size' => $segment['min_size'],
            'max_size' => $segment['max_size'],
            'price' => $segment['price'],
            'discount' => $segment['discount'],
        ]);
        return Response::redirect('/order-segments/list');
    }

    public function delete(Request $request)
    {

    }
}