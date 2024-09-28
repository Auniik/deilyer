<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Area;
use App\Models\District;
use Core\Request;
use Core\Response;

class ApiResourceController extends Controller
{
    public function getDistricts(Request $request, $division_id)
    {
        $districts = District::query()->where('division_id', $division_id)->all();
        return $districts;
    }

    public function getAreas(Request $request, $district_id)
    {
        $areas = Area::query()->where('district_id', $district_id)->all();
        return $areas;
    }
}