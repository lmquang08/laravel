<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use App\Models\Permission;


class SwitchRoleController extends Controller
{
    public function index(Request $request)
    {
        // lay ra toan bo role cua user vua dang nhap
        $idUser = $request->session()->get('sessionIdUser');
        $roles = Admin::find($idUser)->roles()->orderBy('name')->get();

        if($request->session()->get('permissionSessionUser')){
            $request->session()->forget('permissionSessionUser');
            $request->session()->forget('namePermissionSession');
        }

        return view('admin.switch-role', [
            'roles' => $roles
        ]);
    }

    public function handleSwitchRole(Request $request)
    {
        $idRole = $request->id;
        $roles = Role::find($idRole);
        if($roles === null){
            return redirect()->back()->with('errorSwitchRole', 'Role not found');

        }
        else{
            // lay het permissions cua role duoc chon
            $permission = Role::find($idRole)->permissions()->orderBy('name')->get();
            if($permission === null){
                return redirect()->back()->with('errorSwitchRole', 'permission not found');
            }
            else {
                $arrPermission = $permission->toArray();
                $arrSessionPermissions = array_column($arrPermission, 'id');
                $strSessionPermissions = implode(",", $arrSessionPermissions);
                $request->session()->put('permissionSessionUser', $strSessionPermissions);
                $request->session()->put('namePermissionSession', $roles->name);
                return redirect()->route('admin.dashboard');
            }
        }
    }
}

