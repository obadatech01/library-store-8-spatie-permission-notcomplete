<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('permission:users|users-create|users-edit|users-soft-delete', ['only' => ['index','store']]);
        $this->middleware('permission:users-create', ['only' => ['create','store']]);
        $this->middleware('permission:users-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:users-soft-delete', ['only' => ['delete']]);
    }

    public function index()
    {
        $allData['users'] = User::all();
        return view('users.index', $allData);
        // $allData['users'] = User::all();
        // view('users.index', $allData)
        //     ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        // return view('users.create');
        // $roles = Role::pluck('name','name')->all();
        $roles = Role::all();
        return view('users.create',compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->mobile = $request->mobile;
        $data->roles_name = $request->roles_name;

        if($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('profiles_image/'.$data->image));
            $filename = date('YmdHi').'.'.$file->getClientOriginalName();
            $file->move(public_path('profiles_image'), $filename);
            $data['image'] = $filename;
        }

        $data->save();

        $data->assignRole($request->input('roles_name'));

        $notification = array(
            'message' => 'تم إضافة المستخدم بنجاح!',
            'alert-type' => 'success'
        );

        return redirect()->route('users.index')->with($notification);
    }

    public function edit($id)
    {
        // $editData = User::find($id);

        // if(!$editData){
        //     $notification = array(
        //         'message' => 'أعد المحاولة مرة أخرى',
        //         'alert-type' => 'error'
        //     );
        //     return redirect()->route('users.index')->with($notification);
        // }

        // // $editData = User::findOrFail($id);
        // return view('users.edit', compact('editData'));

        $editData = User::find($id);

        if(!$editData){
            $notification = array(
                'message' => 'أعد المحاولة مرة أخرى',
                'alert-type' => 'error'
            );
            return redirect()->route('users.index')->with($notification);
        }
        // $roles = Role::pluck('name','name')->all();
        $userRole = $editData->roles->pluck('name','name')->all();
        $roles = Role::all();

        return view('users.edit',compact('editData','roles','userRole'));
    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->roles_name = $request->roles_name;
        $data->status = $request->status;
        // if($data->roles_name != 'owner') {
        //     $data->roles_name = $request->roles_name;
        //     $data->status = $request->status;
        // }

        if($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('profiles_image/'.$data->image));
            $filename = date('YmdHi').'.'.$file->getClientOriginalName();
            $file->move(public_path('profiles_image'), $filename);
            $data['image'] = $filename;
        }

        $data->save();

        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $data->assignRole($request->input('roles'));

        $notification = array(
            'message' => 'تم تحديث المستخدم بنجاح!',
            'alert-type' => 'info'
        );

        return redirect()->route('users.index')->with($notification);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->status = 0;
        $user->save();
        $user->delete();

        $notification = array(
            'message' => 'تم حذف المستخدم بنجاح',
            'alert-type' => 'error'
        );

        return redirect()->route('users.index')->with($notification);
    }
}
