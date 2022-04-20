<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index');
    }

    public function addRole()
    {
        $permission = Permission::all();
        return view('admin.roles.add',[
            'permission' => $permission
        ]);
    }
}
