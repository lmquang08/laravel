<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class AccountController extends Controller
{
    public function __construct()
    {
        
    }

    public function index()
    {
        $account = Admin::paginate(4);
        return view('admin.account.index', [
            'account' => $account
        ]);
    }

    

    public function addAccount()
    {
        $listRoles = Role::all();
        return view('admin.account.add', [
            'roles' => $listRoles
        ]);
    }

    public function handleAdd(Request $request, Admin $admin)
    {
        // cac ban tu xu ly viec kiem tra tinh hop le du lieu 
        // validation laravel
        // gia su cac du lieu deu hop le

        // co 2 cong viec can xu ly
        // CV 1 : them moi du lieu vao bang admins
        // CV 2: them moi du lieu vao bang admin_role
        $username = $request->input('username');
        $password = $request->input('password');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $fullName = $request->input('fullname');
        $address = $request->input('address');
        $birthday = $request->input('birthday'); // YYYY-MM-DD
        $birthday = date('Y-m-d', strtotime($birthday)); // YYYY-MM-DD
        $gender = $request->input('gender');
        $gender = $gender === '0' || $gender === '1' ? $gender : '0';
        $roles = $request->input('role'); // array chua cac vai tro

        // tien hanh upload images - avatar
        // kim tra xem co thuc su upload file ko
        $nameAvatar = null;
        if ($request->hasFile('avatar')) {
            // kiem tra file co loi ko
            if ($request->file('avatar')->isValid()) {
                // $extension = $request->file('avatar')->getClientOriginalExtension();
                // thuc su tien hanh upload file
                // lay ra ten file
                $nameAvatar = $request->file('avatar')->hashName();
                
                // di chuyen vao thu muc
                $request->file('avatar')->store(PATH_UPLOAD_AVATAR);
            }
        }

        // tien hanh luu database
        // ma hoa mk moi luu vao db
        $hasPassword = Hash::make($password);

        $admin->username = $username;
        $admin->password = $hasPassword;
        $admin->email = $email;
        $admin->phone = $phone;
        $admin->fullname = $fullName;
        $admin->address = $address;
        $admin->birthday = $birthday;
        $admin->avatar = $nameAvatar;
        $admin->gender = $gender;
        // save
        $admin->save();
        $idAdmin = $admin->id; // lay ra id vua tao moi

        // luu vao bang admin_role
        if (is_numeric($idAdmin) && $idAdmin > 0) {
            $dataRoles = [];
            foreach ($roles as $role) {
                $dataRoles[] = [
                    'admin_id' => $idAdmin,
                    'role_id' => $role,
                    'created_at' => date('Y-m-d H:i:s')
                ];
            }
            $insert = DB::table('admin_role')->insert($dataRoles);
            if ($insert) {
                // quay ve trang list user
                return redirect()->route('admin.account')->with('success.add.user', 'Add Success');
            } else {
                // xoa du lieu o bang admin
                $user = Admin::find($idAdmin);
                $user->delete();
                // xoa anh da upload
                if (Storage::exists(PATH_UPLOAD_AVATAR . '/' . $nameAvatar)) {
                    Storage::delete(PATH_UPLOAD_AVATAR . '/' . $nameAvatar);
                }
                // quay ve lai dung form add
                return redirect()->route('admin.add.account')->with('error.add.user', 'Add Failed admin role table');
            }
        } else {
            // delete anh avatar da upload
            if (Storage::exists(PATH_UPLOAD_AVATAR . '/' . $nameAvatar)) {
                Storage::delete(PATH_UPLOAD_AVATAR . '/' . $nameAvatar);
            }
            return redirect()->route('admin.add.account')->with('error.add.user', 'Add Failed admin table');
        }
    }

    public function edit($id) {
        $account = Admin::find($id);
        return view('admin.account.edit', compact('account'));


    }
    
    public function handleEdit(Request $request, $id){
        $account = Admin::find($id);
        $username = $request->input('username');
        $password = $request->input('password');
        $phone = $request->input('phone');
        $fullName = $request->input('fullname');
        $address = $request->input('address');
        $birthday = $request->input('birthday'); // YYYY-MM-DD
        $birthday = date('Y-m-d', strtotime($birthday)); // YYYY-MM-DD
        
        $nameAvatar = null;
        if ($request->hasFile('avatar')) {
            // kiem tra file co loi ko
            if ($request->file('avatar')->isValid()) {
                // $extension = $request->file('avatar')->getClientOriginalExtension();
                // thuc su tien hanh upload file
                // lay ra ten file
                $nameAvatar = $request->file('avatar')->hashName();
                // di chuyen vao thu muc
                $request->file('avatar')->store(PATH_UPLOAD_AVATAR);
            }
        }



        $hasPassword = Hash::make($password);
        $account->username = $username;
        $account->password = $hasPassword;
        $account->phone = $phone;
        $account->fullname = $fullName;
        $account->address = $address;
        $account->birthday = $birthday;
        $account->avatar = $nameAvatar;
        $account->update();

        return redirect()->route('admin.account')->with('success.edit.user', 'Update User Success');
    }

    public function handleDelete($id) {

        $account = Admin::find($id);
        $account->delete();

        return redirect()->route('admin.account')->with('success.delete.user', 'Delete User Success');
    }
}
