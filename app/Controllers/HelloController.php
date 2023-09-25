<?php

namespace App\Controllers;

use App\Services\HelloService;
use Core\Request;
use Core\Response;

class HelloController extends Controller
{
    public function __construct(
        protected HelloService $helloService,
        protected $bonk = 10
    )
    {
    }

    public function index(Request $request, $id, $product_id)
    {
    
        return view('hello.view', [
            'bonk' => [
                'bonk' => $request,
                'bonk2'=> 'bonk', $id, $product_id
            ]
        ]);
    }

    public function store(Request $request, $id, $product_id)
    {
        dd($id, $product_id, $this->helloService);
    }
}