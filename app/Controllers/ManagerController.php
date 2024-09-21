<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\User;
use App\Models\UserArea;
use Core\Container;
use Core\Request;
use Core\Response;
use Delight\Auth\Auth;
use Delight\Auth\Role;
use Delight\Auth\UserManager;

class ManagerController extends Controller
{
    public function index(Request $request): bool|string
    {
        $managers = User::query()
            ->where('roles_mask', Role::MANAGER)
            ->all();

        return view('dashboard/managers/index.view', [
            'managers' => $managers
        ]);
    }

    public function create()
    {
        $divisions = config('areas');
        return view('dashboard/managers/create.view', [
            'divisions' => $divisions
        ]);
    }

    public function store(Request $request): bool
    {
        /** @var Auth $auth */
        $auth = $this->container->make('auth');
        $userId = $auth->admin()->createUser(
            $request->get('email'),
            $request->get('password'),
            $request->get('username')
        );
        $auth->admin()->addRoleForUserById($userId, Role::MANAGER);

        foreach ($request->get('areas', []) as $area) {
            UserArea::query()->sync([
                'user_id' => $userId,
                'area_id' => (int)$area
            ]);
        }
        return Response::redirect('/managers/list');
    }

    public function edit(Request $request, $id)
    {
        $areas = UserArea::query()
                ->where('user_id', $id)
                ->all(['area_id']);
        $areas = array_map(fn($area) => $area->area_id, $areas);

        $divisions = config('areas');

        foreach ($divisions as $divId => $division) {
            foreach ($division['districts'] as $districtId => $district) {
                dd($district);
            }
        }

        return view('dashboard/managers/edit.view', [
            'manager' => User::query()->find($id),
            'divisions' => config('areas'),
            'selected_division' => '',
            'selected_areas' => $areas
        ]);
    }
}