<?php

namespace App\Controllers;

use App\Models\District;
use App\Models\Division;
use App\Models\User;
use App\Models\UserArea;
use Core\Request;
use Core\Response;
use Core\View;
use Delight\Auth\Auth;
use Delight\Auth\Role;

class ManagerController extends Controller
{
    public function index(Request $request): View
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

        return view('dashboard/managers/create.view', [
            'divisions' => Division::query()->all()
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

    public function edit(Request $request, $id): View
    {
        $areas = UserArea::query()
                ->where('user_id', $id)
                ->all(['area_id']);
        $selected_district = District::query()
            ->find($areas[0]->area_id);
        $selected_division = Division::query()
            ->find($selected_district->division_id);

        return view('dashboard/managers/edit.view', [
            'manager' => User::query()->find($id),
            'divisions' => Division::query()->all(),
            'selected_areas' => $areas,
            'selected_division' => $selected_division,
            'selected_district' => $selected_district
        ]);
    }
}