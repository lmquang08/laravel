<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index');
    }

    public function addRole()
    {
        $permission = Permission::all();
        return view('admin.roles.add', [
            'permission' => $permission
        ]);
    }

    public function handleAddRole(Request $request)
    {
        if ($request->ajax()) {
            // validation data
            $validator = Validator::make($request->all(), [
                'nameRole' => 'required|unique:roles,name',
                'strIdPermission' => 'required'
            ], [
                'nameRole.required' => 'Ten Role khong duoc de trong',
                'nameRole.unique' => 'Ten Role da ton tai',
                'strIdPermission.required' => 'Vui long gan quyen cho vai tro'
            ]);

            if ($validator->fails()) {
                // co loi
                // tra loi ve 
                return response()->json(['errors' => $validator->errors()->all()]);
            } else {
                // o co loi
                $nameRole = $request->nameRole;
                $slug = slugifyVietnam($nameRole);
                $description = $request->descriptionRole;
                $roles = new Role;
                $roles->name = $nameRole;
                $roles->slug = $slug;
                $roles->description = $description;
                $roles->save();
                // lay ra id de con luu sang role_permission
                $idRole = $roles->id;

                // lu tiep vao bang role_permission
                $strIdPermission = $request->strIdPermission;
                $arrPermission = explode(",", $strIdPermission);
                $dataInsert = [];
                foreach ($arrPermission as $idPermission) {
                    $dataInsert[] = [
                        'role_id' => $idRole,
                        'permission_id' => $idPermission,
                        'created_at' => date("Y-m-d H:i:s")
                    ];
                }
                $insert = DB::table('role_permissions')->insert($dataInsert);
                if ($insert) {
                    return response()->json(['success' => 'Them du lieu thanh cong']);
                }
                return response()->json(['fails' => 'Them du lieu that bai']);
            }
        }
    }
}
