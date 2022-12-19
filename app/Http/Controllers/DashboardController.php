<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Session;

class DashboardController extends Controller
{
    public $products;
    public $users;
    public $user;
    public $array;
    public $permission;
    public function index()
    {
        $this->products = Product::all();
        $this->permission = [
            'create_product' => permissionCheck(Auth::id(), 'create_product'),
            'view_product' => permissionCheck(Auth::id(), 'view_product'),
            'edit_product' => permissionCheck(Auth::id(), 'edit_product'),
            'delete_product' => permissionCheck(Auth::id(), 'delete_product'),
        ];
        return Inertia::render('Dashboard',[
            'products' => $this->products,
            'permission' => $this->permission,
        ]);
    }
    public function users()
    {
        $this->users = User::all();
        return Inertia::render('UserManage',[
            'users' => $this->users,
        ]);
    }
    public function role_edit($id)
    {
        return Inertia::render('RoleEdit',[
            'user'          => User::find($id),
            'permissions'   => UserPermission::where('user_id', $id)->get(),
        ]);
    }
    public function change_role(Request $request)
    {
        $this->user = User::find($request->id);
        $this->user->role = $request->value;
        $this->user->save();
        return back();
    }
    public function user_permission(Request $request)
    {
        $this->array = [
            [
              'user_id'     => $request->user_id,
              'permission'  => 'create_product',
              'value'       => $request->create_product,
            ],
            [
              'user_id'     => $request->user_id,
              'permission'  => 'view_product',
              'value'       => $request->view_product,
            ],
            [
              'user_id'     => $request->user_id,
              'permission'  => 'edit_product',
              'value'       => $request->edit_product,
            ],
            [
              'user_id'     => $request->user_id,
              'permission'  => 'delete_product',
              'value'       => $request->delete_product,
            ],
        ];
        UserPermission::updatePermission($this->array);
        return back();
    }
    public function user_details($id)
    {
        return Inertia::render('UserDetails',[
            'user'          => User::find($id),
            'permissions'   => UserPermission::where('user_id', $id)->get(),
        ]);
    }
    public function users_delete($id)
    {
        User::find($id)->delete();
        return back();
    }

}
