<?php

namespace App\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\User;
use App\Models\UserArea;
use Core\Request;
use Core\Response;
use Delight\Auth\Auth;
use Delight\Auth\Role;

class CustomerController extends Controller
{
    public function index(Request $request): bool|string
    {
        $deliveryMens = User::query()
            ->where('roles_mask', Role::CONSUMER)
            ->all();

        return view('dashboard/customers/index.view', [
            'customers' => $deliveryMens
        ]);
    }

    public function create()
    {
        return view('dashboard/customers/create.view', [
            'divisions' => Division::query()->all()
        ]);
    }

    public function edit(Request $request, $id): bool|string
    {
        return view('dashboard/customers/edit.view', [
            'customer' => User::query()->where('role_mask', Role::CONSUMER)->find($id)
        ]);
    }
}