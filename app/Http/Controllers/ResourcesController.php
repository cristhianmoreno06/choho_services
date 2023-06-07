<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;
use App\Models\Departamento;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function getDepartments()
    {
        $departments = Departamento::all();

        return response()->json(['departments' => $departments]);
    }

    public function getCities(Request $request)
    {
        $cities = Ciudad::whereIdDepartamento($request->get('parentId'))->get();

        return response()->json(['cities' => $cities]);
    }
}
